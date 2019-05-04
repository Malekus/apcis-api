<?php

namespace Tests\Unit;

use App\Caf;
use App\Personne;
use Carbon\Carbon;
use Tests\TestCase;

class CafTest extends TestCase
{
    private $classe = 'Caf';
    private $route = '/api/caf/';

    public function testIndex()
    {
        $response = $this->get($this->route);
        $response->assertStatus(200);
    }

    public function testShow()
    {
        $caf = factory(Caf::class)->create();
        $response = $this->get($this->route . $caf->id);
        $response->assertStatus(200);
        $response = $this->get($this->route . '99999');
        $response->assertStatus(404);
    }

    public function testDestroy()
    {
        $caf = factory(Caf::class)->create();
        $response = $this->delete($this->route . $caf->id);
        $response->assertStatus(200);
        $response = $this->get($this->route . $caf->id);
        $response->assertStatus(404);
    }

    public function testStorePost()
    {
        $response = $this->post($this->route, ['dateCaf' => Carbon::now(), 'personne' => 5]);
        $response->assertStatus(201);
        $response = $this->post($this->route, ['dateCaf' => null]);
        $response->assertStatus(422);
    }

    public function testStorePut()
    {
        $caf = factory(Caf::class)->create();
        // Update simple
        $response = $this->put($this->route . $caf->id, ['dateCaf' => Carbon::now(), 'personne' => 15]);
        $response->assertStatus(200);
        $response = $this->put($this->route . $caf->id, ['dateCaf' => Carbon::now(), 'personne' => null]);
        $response->assertStatus(422);
    }

    public function testDeletePersonne()
    {
        $personne = factory(Personne::class)->create();
        $caf = factory(Caf::class)->create();
        $response = $this->put($this->route . $caf->id, ['dateCaf' => $caf->dateCaf, 'personne' => $personne->id]);
        $response->assertStatus(200);
        $response = $this->delete('/api/personne/' . $personne->id);
        $response->assertStatus(200);
        $response = $this->get($this->route.$caf->id);
        $response->assertStatus(404);
    }
}
