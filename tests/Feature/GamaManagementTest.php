<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Gama;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GamaManagementTest extends TestCase
{
    //use RefreshDatabase;

    /** @test */
    public function a_gama_can_be_created()
    {

        $this->withoutExceptionHandling();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer 1|LRrAujLdlGT7kHtmh0aMzGR8wbGAMXtH7uWpSpNQ',
        ])->post('/api/gamas', [
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

        $response = $this->withHeaders([
            'Authorization' => 'Bearer 1|LRrAujLdlGT7kHtmh0aMzGR8wbGAMXtH7uWpSpNQ',
        ])->get('/api/gamas');
        
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

    /** @test */
    public function a_gama_can_be_retrieved()
    {
        $this->withoutExceptionHandling();

        $gama = Gama::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer 1|LRrAujLdlGT7kHtmh0aMzGR8wbGAMXtH7uWpSpNQ',
        ])->get('/api/gamas/' . $gama->id_gama);
        
        $response->assertOk(200);
        $response->assertJsonStructure([
            "data" => [
                "gama",
                "id_region",
                "descripcion",
                "escudo"
            ]
        ]);

        $this->assertDatabasehas('gamas',[
            "gama" => $gama->gama,
            "id_region" => $gama->id_region,
            "descripcion" => $gama->descripcion,
            "escudo" => $gama->escudo
        ]);
    }

    /** @test */
    public function a_gama_can_be_updated()
    {

        $this->withoutExceptionHandling();

        $gama = Gama::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer 1|LRrAujLdlGT7kHtmh0aMzGR8wbGAMXtH7uWpSpNQ',
        ])->json('PUT' , '/api/gamas/' . $gama->id_gama, [
            "gama" => "CATALOGO POLICIAL EDIT",
            "id_region" => "1",
            "descripcion" => "DESCRIPCIÓN DE CATALOGO EDIT",
            "escudo" => "ZZZ"
        ]);

        $response->assertJsonStructure([
            "data" => [
                "gama",
                "id_region",
                "descripcion",
                "escudo"
            ]
        ])->assertStatus(200);

        $this->assertDatabasehas('gamas',[
            "gama" => "CATALOGO POLICIAL EDIT",
            "id_region" => "1",
            "descripcion" => "DESCRIPCIÓN DE CATALOGO EDIT",
            "escudo" => "ZZZ"
        ]);
    }

    /** @test */
    public function a_gama_can_be_deleted()
    {

        $this->withoutExceptionHandling();

        $gama = Gama::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer 1|LRrAujLdlGT7kHtmh0aMzGR8wbGAMXtH7uWpSpNQ',
        ])->json('DELETE' , '/api/gamas/' . $gama->id_gama);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('gamas',[
            "gama" => $gama->gama,
            "id_region" => $gama->id_region,
            "descripcion" => $gama->descripcion,
            "escudo" => $gama->escudo
        ]);
    }
}
