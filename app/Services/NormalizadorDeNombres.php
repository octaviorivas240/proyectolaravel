<?php

namespace App\Services;

class NormalizadorDeNombres
{
    public static function normalizar(string $nombre): string
    {
        // Quitar espacios al inicio y al final
        $nombre = trim($nombre);

        // Si está vacío, regresar cadena vacía
        if ($nombre === '') {
            return '';
        }

        // Reemplazar múltiples espacios por uno solo
        $nombre = preg_replace('/\s+/', ' ', $nombre);

        // Convertir a "Title Case" usando multibyte (preserva acentos)
        $nombre = mb_convert_case($nombre, MB_CASE_TITLE, "UTF-8");

        return $nombre;
    }
}
