<?php

namespace Tests\Unit;

use App\Action;
use App\Probleme;
use Tests\TestCase;

class ActionTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get('/api/action');
        $response->assertStatus(200);
    }

    public function testShow()
    {
        $action = factory(Action::class)->create();
        $response = $this->get('/api/action/' . $action->id);
        $response->assertStatus(200);
        $response = $this->get('/api/action/99999');
        $response->assertStatus(404);
    }

    public function testDestroy()
    {
        $action = factory(Action::class)->create();
        $response = $this->delete('/api/action/' . $action->id);
        $response->assertStatus(200);
        $response = $this->get('/api/action/' . $action->id);
        $response->assertStatus(404);
    }

    public function testStorePost()
    {
        // Creation d'une action
        $response = $this->post('/api/action', ['probleme' => 9,
            'action' => 5]);
        $response->assertStatus(201);
        // Creation d'une action avec erreur de contrainte
        $response = $this->post('/api/action', ['probleme' => '']);
        $response->assertStatus(422);
    }

    public function testStorePut()
    {
        $action = factory(Action::class)->create();
        // Update simple
        $response = $this->put('/api/action/' . $action->id, ['probleme' => 6, 'action' => 15]);
        $response->assertStatus(200);
        // Update avec erreur
        $response = $this->put('/api/action/' . $action->id, ['probleme' => 5]);
        $response->assertStatus(422);

    }

    public function deleteProblemeAndAction()
    {
        $probleme = factory(Probleme::class)->create();
        $action = factory(Action::class)->create();
        $response = $this->put('/api/action/' . $action->id, ['probleme' => $probleme->id, 'action' => 15]);
        $response->assertStatus(200);
        $this->assertEquals($action->probleme->id, $probleme->id);
        $response = $this->delete('/api/probleme/' . $probleme->id);
        $response->assertStatus(200);
        $response = $this->get('/api/action/' . $action->id);
        $response->assertStatus(404);
    }
}
