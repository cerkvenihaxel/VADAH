<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\ObraSocial;
use App\Models\User;
use Illuminate\Support\Str;

class ObraSocialTest extends TestCase
{
    use RefreshDatabase;

    private $headers;

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->create();
        $token = $user->createToken('test_token')->plainTextToken;

        $this->headers = [
            'Authorization' => "Bearer $token",
        ];
    }

    public function test_store_obra_social()
    {
        $response = $this->postJson('/api/obra_social/store', [
            'nombre' => 'Nueva Obra Social',
            'codigoUnico' => (string) Str::uuid(),
        ], $this->headers);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'nombre' => 'Nueva Obra Social',
                ],
            ]);

        $this->assertDatabaseHas('obra_social', [
            'nombre' => 'Nueva Obra Social',
        ]);
    }

    public function test_index_obras_sociales()
    {
        ObraSocial::factory()->count(3)->create();

        $response = $this->getJson('/api/obra_social', $this->headers);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'nombre', 'codigoUnico']
                ],
            ]);
    }

    public function test_update_obra_social()
    {
        $obraSocial = ObraSocial::factory()->create();

        $response = $this->putJson("/api/obra_social/{$obraSocial->id}", [
            'nombre' => 'Obra Social Actualizada',
        ], $this->headers);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $obraSocial->id,
                    'nombre' => 'Obra Social Actualizada',
                ],
            ]);

        $this->assertDatabaseHas('obra_social', [
            'id' => $obraSocial->id,
            'nombre' => 'Obra Social Actualizada',
        ]);
    }

    public function test_delete_obra_social()
    {
        $obraSocial = ObraSocial::factory()->create();

        $response = $this->deleteJson("/api/obra_social/{$obraSocial->id}", [], $this->headers);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('obra_social', [
            'id' => $obraSocial->id,
        ]);
    }
}
