<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        // Validar que venga el parámetro 'city'
        $request->validate([
            'city' => 'required|string',
        ]);

        $city = $request->input('city');
        $apiKey = env('OPENWEATHER_API_KEY');

        // Codificar la ciudad y agregar ",mx" para México
        $cityParam = urlencode("{$city},mx");
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$cityParam}&appid={$apiKey}&units=metric";

        try {
            $response = Http::timeout(10)->get($url); // Timeout de 10 segundos

            if ($response->successful()) {
                $data = $response->json();

                // Retornar solo los datos importantes
                return response()->json([
                    'city' => $data['name'] ?? 'Desconocida',
                    'temperature' => $data['main']['temp'] ?? null,
                    'feels_like' => $data['main']['feels_like'] ?? null,
                    'description' => $data['weather'][0]['description'] ?? null,
                    'humidity' => $data['main']['humidity'] ?? null,
                    'wind_speed' => $data['wind']['speed'] ?? null,
                    'clouds' => $data['clouds']['all'] ?? null,
                    'sunrise' => isset($data['sys']['sunrise']) ? date('H:i', $data['sys']['sunrise']) : null,
                    'sunset' => isset($data['sys']['sunset']) ? date('H:i', $data['sys']['sunset']) : null,
                ]);
            }

            // Si la API responde pero con error (ej. ciudad no encontrada)
            return response()->json([
                'error' => 'Ciudad no encontrada o datos no disponibles'
            ], $response->status());

        } catch (ConnectionException $e) {
            // Error de conexión (por ejemplo SSL o Internet)
            return response()->json([
                'error' => 'No se pudo conectar con el servicio de clima',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
