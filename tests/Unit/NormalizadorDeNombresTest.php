<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\NormalizadorDeNombres;

class NormalizadorDeNombresTest extends TestCase
{
    public function test_normaliza_nombre_basico()
    {
        $resultado = NormalizadorDeNombres::normalizar("   jUaN   péRez  ");
        $this->assertEquals("Juan Pérez", $resultado);
    }

    public function test_normaliza_nombre_con_espacios_multiples()
    {
        $resultado = NormalizadorDeNombres::normalizar(" Ana   maria   lopez ");
        $this->assertEquals("Ana Maria Lopez", $resultado);
    }

    public function test_devuelve_string_vacio_para_nombre_vacio()
    {
        $resultado = NormalizadorDeNombres::normalizar("   ");
        $this->assertEquals("", $res);
    }
}
