<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Client;

class ClientTest extends TestCase{
    use RefreshDatabase;

    public function test_user_can_create_client(){
        $this->withoutExceptionHandling();
        $response = $this->post('/clients', [
            'name' => 'CORE company',
            'code' => 'GSHJS%^%!',
        ]);

        $response->assertStatus(200);
        $this->assertTrue(Client::all()->count() == 1);
    }

    // update test
    public function test_user_can_update_client(){
        $this->withoutExceptionHandling();

        $client = Client::factory(['name' => 'ABC company'])->create();
        $this->assertDatabaseHas('clients', ['name' => 'ABC company']);

        $response = $this->put('/clients/'.$client->id, [
            'name' => 'ABC company updated',
            'code' => $client->code
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('clients', ['name' => 'ABC company updated']);
    }

    // read test
    public function test_user_can_see_client(){
        $this->withoutExceptionHandling();
        $client = Client::factory()->create();

        $res = $this->get("/clients/".$client->id);
        $res->assertStatus(200);
        $res->assertSee($client->name);
    }

    // can delete client
    public function test_can_delete_client(){
        $this->withoutExceptionHandling();

        $client = Client::factory()->create();
        $this->assertTrue(Client::all()->count() == 1);

        $this->delete('/clients/'.$client->id);
        $this->assertTrue(Client::all()->count() == 0);
    }
}
