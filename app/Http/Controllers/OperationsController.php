<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperationsController extends Controller
{
    public function calcularVenta(
        float $precioUnitario,
        int $cantidad,
        float $impuestoPorcentaje = 0,
        float $descuentoPorcentaje = 0
    ): array {
        if ($precioUnitario < 0 || $cantidad < 1) {
            throw new \InvalidArgumentException('Datos de entrada inválidos');
        }

        $subtotal = $precioUnitario * $cantidad;
        $descuento = ($subtotal * $descuentoPorcentaje) / 100;
        $subtotalConDescuento = $subtotal - $descuento;

        $impuesto = ($subtotalConDescuento * $impuestoPorcentaje) / 100;
        $total = $subtotalConDescuento + $impuesto;

        return [
            'subtotal' => round($subtotal, 2),
            'descuento' => round($descuento, 2),
            'subtotal_final' => round($subtotalConDescuento, 2),
            'impuesto' => round($impuesto, 2),
            'total' => round($total, 2),
        ];
    }
}
