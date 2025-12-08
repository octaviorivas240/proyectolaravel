<?php

namespace Tests\Unit;

use App\Http\Controllers\OperationsController;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    public function test_calcular_venta(): void
    {
        $controller = new OperationsController;

        $resultado = $controller->calcularVenta(
            precioUnitario: 100.0,
            cantidad: 2,
            impuestoPorcentaje: 16,
            descuentoPorcentaje: 10
        );

        $this->assertIsArray($resultado);
        $this->assertArrayHasKey('subtotal', $resultado);
        $this->assertArrayHasKey('descuento', $resultado);
        $this->assertArrayHasKey('subtotal_final', $resultado);
        $this->assertArrayHasKey('impuesto', $resultado);
        $this->assertArrayHasKey('total', $resultado);

        $this->assertSame(200.0, $resultado['subtotal']);
        $this->assertSame(20.0, $resultado['descuento']);
        $this->assertSame(180.0, $resultado['subtotal_final']);
        $this->assertSame(28.8, $resultado['impuesto']);
        $this->assertSame(208.8, $resultado['total']);

        foreach ($resultado as $valor) {
            $this->assertIsFloat($valor);
        }
    }

    public function test_calcular_venta_sin_impuestos_ni_descuento(): void
    {
        $controller = new OperationsController;

        $resultado = $controller->calcularVenta(50.0, 3);

        $this->assertSame(150.0, $resultado['subtotal']);
        $this->assertSame(0.0, $resultado['descuento']);
        $this->assertSame(150.0, $resultado['subtotal_final']);
        $this->assertSame(0.0, $resultado['impuesto']);
        $this->assertSame(150.0, $resultado['total']);
    }

    public function test_calcular_venta_datos_invalidos(): void
    {
        $controller = new OperationsController;

        $this->expectException(\InvalidArgumentException::class);

        $controller->calcularVenta(
            precioUnitario: -10,
            cantidad: 0
        );
    }
}
