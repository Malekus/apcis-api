<?php

namespace Tests\Unit;

use App\Configuration;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get('/api/configuration');
        $response->assertStatus(200);
    }

    public function testShow()
    {
        $model = factory(Configuration::class)->create();
        $response = $this->get('/api/configuration/' . $model->id);
        $response->assertStatus(200);
    }

    public function testDestroy()
    {
        $model = factory(Configuration::class)->create();
        $response = $this->delete('/api/configuration/' . $model->id);
        $response->assertStatus(200);
        $response = $this->get('/api/configuration/' . $model->id);
        $response->assertStatus(404);
    }

    public function testStorePost()
    {
        // Creation d'une configuration
        $model = factory(Configuration::class)->make();
        $response = $this->post('/api/configuration', ['categorie' => $model->categorie, 'champ' => $model->champ, 'libelle' => $model->libelle]);
        $response->assertStatus(201);
        // Creation d'une configuration déjà existante
        $response = $this->post('/api/configuration', ['categorie' => 'Personne', 'champ' => 'azertyui', 'libelle' => 'Driver']);
        $response->assertStatus(500);
        // Creation d'un configuration avec erreur de contrainte
        $response = $this->post('/api/configuration', ['categorie' => '', 'champ' => 'azertyui', 'libelle' => 'Driver']);
        $response->assertStatus(422);
    }

    public function testStorePut()
    {
        $configuration = Configuration::all()->random();
        $model = factory(Configuration::class)->make();
        $response = $this->put('/api/configuration/' . $configuration->id, ['categorie' => "Partenaire"]);
        $response->assertStatus(422);
        $response = $this->put('/api/configuration/' . $configuration->id, ['categorie' => $model->categorie, 'champ' => $model->champ, 'libelle' => $model->libelle]);
        $response->assertStatus(200);
    }

}
