<?php

namespace App\Http\Controllers;

use App\Services\NormalizadorDeNombres;
use Illuminate\Http\Request;

class OperationsController extends Controller
{
    /**
     * Normaliza un nombre recibido por Request.
     */
    public function normalizarNombre(Request $request): string
    {
        $nombre = $request->input('nombre', '');

        return NormalizadorDeNombres::normalizar($nombre);
    }
}
