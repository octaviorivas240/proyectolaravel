<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function form()
    {
        return view('calcular_producto');
    }

    public function calcular(Request $request)
    {
        $precioInicial = $request->precioInicial;
        $tipoCalculo = $request->tipoCalculo;

        switch ($tipoCalculo) {
            case 'depreciacion':
                $anos = $request->anos;
                $valorFinal = $precioInicial * pow(0.9, $anos);
                $detalle = "Depreciación del 10% por $anos año(s)";
                break;

            case 'iva':
                $valorFinal = $precioInicial * 1.16;
                $detalle = "IVA del 16% aplicado";
                break;

            case 'descuento':
                $descuento = $request->descuento;
                $valorFinal = $precioInicial - ($precioInicial * ($descuento/100));
                $detalle = "Descuento del $descuento% aplicado";
                break;

            case 'comision':
                $comision = $request->comision;
                $valorFinal = $precioInicial + ($precioInicial * ($comision/100));
                $detalle = "Comisión del $comision% aplicada";
                break;

            default:
                return "Tipo de cálculo no válido.";
        }

        return view('resultado_producto', [
            'precioInicial' => $precioInicial,
            'tipoCalculo' => $tipoCalculo,
            'detalle' => $detalle,
            'valorFinal' => round($valorFinal, 2)
        ]);
    }
}
