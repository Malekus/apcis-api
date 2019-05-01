<?php

namespace Tests\Unit;

use App\Configuration;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
    }


    public function testIndex()
    {

        $response = $this->get('/api/configuration');
        $response->assertStatus(200);
    }

        public function testShow()
        {
            $model = Configuration::create(['categorie' => 'Personne', 'champ' => 'azertyui', 'libelle' => 'Driver']);
            $response = $this->get('/api/configuration/'. $model->id);
            $response->assertStatus(200);
            $data = $response->json()["data"];
            $this->assertEquals($data["categorie"], "Personne");
        }

            public function testDestroy()
            {
                $model = Configuration::create(['categorie' => 'Personne', 'champ' => 'azertyui', 'libelle' => 'Driver']);
                $response = $this->delete('/api/configuration/'.$model->id);
                $response->assertStatus(200);
                $response = $this->get('/api/configuration/'.$model->id);
                $response->assertStatus(404);
            }
            public function testStorePost()
            {
                // Creation d'une configuration
                $response = $this->post('/api/configuration', ['categorie' => 'Personne', 'champ' => 'azertyui', 'libelle' => 'Driver']);
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
        $model = Configuration::create(['categorie' => 'Personne', 'champ' => 'azertyui', 'libelle' => 'Driver']);
        $response = $this->put('/api/configuration/'.$model->id, ['categorie' => "Partenaire"]);
        $response->assertStatus(422);
        $response = $this->put('/api/configuration/'.$model->id, ['categorie' => "Partenaire", 'champ' => 'azertyui', 'libelle' => 'Driver']);
        $response->assertStatus(200);
        $this->assertEquals($response->json()["data"]["categorie"], "Partenaire");
    }

}
