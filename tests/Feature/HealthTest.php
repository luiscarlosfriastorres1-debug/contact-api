<?php

namespace Tests\Feature;

use Tests\TestCase;

class HealthTest extends TestCase
{
    public function test_responde_el_estado_del_servicio(): void
    {
        $this->getJson('/api/v1/health')
            ->assertOk()
            ->assertJson([
                'status' => 'ok',
                'app' => 'contact-api',
            ]);
    }

    public function test_responde_404_en_json_si_la_ruta_no_existe(): void
    {
        $this->get('/api/v1/no-existe')
            ->assertNotFound()
            ->assertHeader('Content-Type', 'application/json');
    }
}
