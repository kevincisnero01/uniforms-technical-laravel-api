<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Gama;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GamaManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_gama_can_be_created()
    {

        $this->withoutExceptionHandling();

        $response = $this->post('/api/gamas', [
            "gama" => "CATALOGO POLICIAL",
            "id_region" => "1",
            "descripcion" => "DESCRIPCIÓN DE CATALOGO",
            "escudo" => "AAA"
        ]);

        $response->assertJsonStructure([
            "data" => [
                "gama",
                "id_region",
                "descripcion",
                "escudo"
            ]
        ])->assertStatus(201);

        $this->assertDatabasehas('gamas',[
            "gama" => "CATALOGO POLICIAL",
            "id_region" => "1",
            "descripcion" => "DESCRIPCIÓN DE CATALOGO",
            "escudo" => "AAA"
        ]);
    }

    /** @test */
    public function list_of_gama_can_be_retrieved()
    {
        $this->withoutExceptionHandling();

        Gama::factory(5)->create();

        $response = $this->get('/api/gamas');
        
        $response->assertJsonStructure([
            "data" => [
                '*' => [
                    "gama",
                    "id_region",
                    "descripcion",
                    "escudo"
                ]
            ]
        ])->assertStatus(200);
    }

}
