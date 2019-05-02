<?php

namespace Tests\Unit;

use App\Partenaire;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PartenaireTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    public function testIndex()
    {
        $response = $this->get('/api/partenaire');
        $response->assertStatus(200);
    }

    public function testShow()
    {
        $partenaire = Partenaire::create(['nom' => "Toto"]);
        $response = $this->get('/api/partenaire/' . $partenaire->id);
        $response->assertStatus(200);
        $this->assertEquals($response->json()["data"]["nom"], "Toto");
        $response = $this->get('/api/partenaire/99999');
        $response->assertStatus(404);
    }

    public function testDestroy()
    {
        $partenaire = Partenaire::create(['nom' => "Toto"]);
        $response = $this->delete('/api/partenaire/' . $partenaire->id);
        $response->assertStatus(200);
        $response = $this->get('/api/partenaire/' . $partenaire->id);
        $response->assertStatus(404);
    }

    public function testStorePost()
    {
        // Creation d'une personne
        $response = $this->post('/api/partenaire', ['nom' => 'Test']);
        $response->assertStatus(201);
        // Creation d'une personne avec erreur de contrainte
        $response = $this->post('/api/partenaire', ['nom' => '']);
        $response->assertStatus(422);
        $response = $this->post('/api/partenaire', ['nom' => 'dededed84']);
        $response->assertStatus(422);
    }

    public function testStorePut()
    {
        $partenaire = Partenaire::create(['nom' => "Toto"]);
        // Update simple
        $response = $this->put('/api/partenaire/' . $partenaire->id, ['nom' => "Tata"]);
        $response->assertStatus(200);
        $this->assertEquals($response->json()["data"]["nom"], "Tata");
        // Update avec erreur
        $response = $this->put('/api/partenaire/' . $partenaire->id, ['nom' => ""]);
        $response->assertStatus(422);

    }


}
