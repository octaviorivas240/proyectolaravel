<?php

namespace Tests\Feature;

use Tests\TestCase;

class NormalizarNombreTest extends TestCase
{
    public function test_normaliza_nombre_correctamente()
    {
        $response = $this->post('/normalizar-nombre', [
            'nombre' => '   jUaN   péRez   ',
        ]);

        $response->assertStatus(200);

        $response->assertJson([
            'original' => '   jUaN   péRez   ',
            'normalizado' => 'Juan Perez',
        ]);
    }

    public function test_valida_que_el_nombre_sea_obligatorio()
    {
        $response = $this->post('/normalizar-nombre', [
            'nombre' => '',
        ]);

        $response->assertStatus(302); // Laravel redirige en validación fallida

        $response->assertSessionHasErrors([
            'nombre',
        ]);
    }
}
