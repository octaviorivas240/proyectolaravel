<?php

namespace Tests\Unit;

use App\Services\ClimaService;
use Tests\TestCase;

class ClimaTest extends TestCase
{
    public function test_prediccion_clima()
    {
        $clima = new ClimaService();

        $resultado = $clima->predecir(18, 90);

        $this->assertEquals("Tormenta", $resultado);
    }
}
