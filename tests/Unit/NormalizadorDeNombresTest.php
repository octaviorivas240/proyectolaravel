<?php

namespace Tests\Unit;

use App\Http\Controllers\OperationsController;
use Tests\TestCase;

class OperationsControllerTest extends TestCase
{
    public function test_suma_basica()
    {
        $controller = new OperationsController;

        $resultado = $controller->addition(10, 5);

        $this->assertEquals(15, $resultado);
    }

    public function test_calcula_imc_correctamente()
    {
        $controller = new OperationsController;

        $resultado = $controller->calcularIMC(70, 1.75);

        $this->assertEquals(22.86, $resultado['imc']);
        $this->assertEquals('Normal', $resultado['categoria']);
    }

    public function test_lanza_excepcion_con_valores_invalidos()
    {
        $controller = new OperationsController;

        $this->expectException(\InvalidArgumentException::class);

        $controller->calcularIMC(0, 1.70); // peso inválido
    }
}
