<?php

namespace Tests\Unit;

use App\Http\Controllers\OperationsController;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Función de Mónica, calcular el IMC.
     */
    public function test_calcularIMC(): void
    {
        $controller = new OperationsController();

        $resultado = $controller->calcularIMC(62, 1.65);

        $this->assertEquals(22.86, $resultado['El IMC es: ']);
        $this->assertEquals('Normal', $resultado['Corresponde a la categoria:']);
    }
}
