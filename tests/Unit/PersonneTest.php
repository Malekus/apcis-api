<?php

namespace Tests\Unit;

use App\Personne;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PersonneTest extends TestCase
{

    public function testIndex()
    {
        $response = $this->get('/api/personne');
        $response->assertStatus(200);
    }

    public function testShow()
    {
        $personne = factory(Personne::class)->create();
        $response = $this->get('/api/personne/' . $personne->id);
        $response->assertStatus(200);
        $response = $this->get('/api/personne/99999');
        $response->assertStatus(404);
    }

    public function testDestroy()
    {
        $personne = factory(Personne::class)->create();
        $response = $this->delete('/api/personne/' . $personne->id);
        $response->assertStatus(200);
        $response = $this->get('/api/personne/' . $personne->id);
        $response->assertStatus(404);
    }

    public function testStorePost()
    {
        // Creation d'une personne
        $response = $this->post('/api/personne', ['nom' => 'Test']);
        $response->assertStatus(201);
        // Creation d'une personne avec erreur de contrainte
        $response = $this->post('/api/personne', ['nom' => '']);
        $response->assertStatus(422);
    }

    public function testStorePut()
    {
        $personne = factory(Personne::class)->create();
        // Update simple
        $response = $this->put('/api/personne/' . $personne->id, ['nom' => "Tata"]);
        $response->assertStatus(200);
        $this->assertEquals($response->json()["data"]["nom"], "Tata");
        // Update avec erreur
        $response = $this->put('/api/personne/' . $personne->id, ['nom' => ""]);
        $response->assertStatus(422);

    }
}
