<?php

namespace App\Http\Controllers;

class OperationsController extends Controller
{
    /**
     * Suma dos números enteros.
     */
    public function addition(int $a, int $b): int
    {
        return $a + $b;
    }

    /**
     * Calcula el IMC y devuelve categoría.
     *
     * @return array{imc: float, categoria: string}
     */
    public function calcularIMC(float $peso, float $altura): array
    {
        if ($peso <= 0 || $altura <= 0) {
            throw new \InvalidArgumentException(
                'La altura y el peso deben ser mayor que cero.'
            );
        }

        $imc = $peso / ($altura * $altura);
        $imc = round($imc, 2);

        if ($imc < 18.5) {
            $categoria = 'Bajo peso';
        } elseif ($imc < 25) {
            $categoria = 'Normal';
        } elseif ($imc < 30) {
            $categoria = 'Sobrepeso';
        } else {
            $categoria = 'Obesidad';
        }

        return [
            'imc' => $imc,
            'categoria' => $categoria,
        ];
    }
}
