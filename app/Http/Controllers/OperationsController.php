<?php

namespace App\Http\Controllers;

class OperationsController extends Controller
{
    public function calcularIMC(float $peso, float $altura): float
    {
        if ($peso <= 0 || $altura <= 0) {
            throw new \InvalidArgumentException("La altura y el peso deben ser 
            mayor que cero.");
        }

        $imc = $peso / ($altura * $altura);
        $imc = round($imc, 2);

        if($imc < 18.5) {
            $categoria = "Bajo peso";
        } elseif ($imc < 25) {
            $categoria = "Normal";
        } elseif ($imc < 30) {
            $categoria = "Sobrepeso";
        } else {
            $categoria = "Obesidad";
        }

        return [
            'El IMC es: ' => $imc,
            'Corresponde a la categoria:' => $categoria
        ];
    }
}
