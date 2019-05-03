<?php

namespace Tests\Unit;

use App\Personne;
use App\Probleme;
use Tests\TestCase;

class ProblemeTest extends TestCase
{

    public function testIndex()
    {
        $response = $this->get('/api/probleme');
        $response->assertStatus(200);
    }

    public function testShow()
    {
        $probleme = Probleme::find(17);
        $response = $this->get('/api/probleme/' . $probleme->id);
        $response->assertStatus(200);
        $response = $this->get('/api/probleme/9999');
        $response->assertStatus(404);
    }

    public function testDestroy()
    {
        $probleme = Probleme::all()->random();
        $response = $this->delete('/api/probleme/' . $probleme->id);
        $response->assertStatus(200);
        $response = $this->get('/api/probleme/' . $probleme->id);
        $response->assertStatus(404);
    }

    public function testStorePost()
    {
        // Creation d'une personne
        $response = $this->post('/api/probleme',
            ['personne' => \App\Personne::all()->random()->id,
                'categorie' => \App\Configuration::where(['categorie' => 'Problème', 'champ' => 'Catégorie'])->get()->random()->id,
                'type' => \App\Configuration::where(['categorie' => 'Problème', 'champ' => 'Type'])->get()->random()->id,
                'accompagnement' => \App\Configuration::where(['categorie' => 'Problème', 'champ' => 'Accompagnement'])->get()->random()->id]
        );
        $response->assertStatus(201);
        $personne = factory(Personne::class)->create();
        $response = $this->post('/api/probleme', ['personne' => "", "categorie" => 2, "type" => 2, "accompagnement" => 2]);
        $response->assertStatus(422);
        $response = $this->post('/api/probleme', ['personne' => $personne, "categorie" => null, "type" => 2, "accompagnement" => 2]);
        $response->assertStatus(422);

    }


    public function testStorePut()
    {
        $probleme = factory(Probleme::class)->create();
        $personne = factory(Personne::class)->create();
        // Update simple
        $response = $this->put('/api/probleme/' . $probleme->id, ['personne' => $personne, "categorie" => 5, "type" => 2, "accompagnement" => 2]);
        $response->assertStatus(200);
        $response = $this->put('/api/probleme/' . $probleme->id, ["accompagnement" => 2]);
        $response->assertStatus(422);

    }

    public function testDeletePersonne()
    {

        $probleme = factory(Probleme::class)->create();
        $personne = factory(Personne::class)->create();
        $probleme->personne()->associate($personne);
        $probleme->save();
        $this->assertEquals($personne, $probleme->personne);
        $response = $this->get('/api/personne/' . $personne->id);
        $response->assertStatus(200);
        $response = $this->delete('/api/personne/' . $personne->id);
        $response->assertStatus(200);
        $response = $this->delete('/api/probleme/' . $probleme->id);
        $response->assertStatus(404);

    }

}
