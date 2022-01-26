<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Client;

class ClientTest extends TestCase
{
    use RefreshDataBase;

    public function test_user_can_create_a_client()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/clients',[
            'name' => 'ABC company',
            'code' => 'ABCCO'
        ]);

        $response->assertStatus(200);
        
        $this->assertTrue(Client::all()->count() == 1);
    }

    //update test
    public function test_user_can_update_a_client()
    {
        $client = Client::factory()->create([
            'name' => 'ABC company'
        ]);

        $this->assertDatabaseHas('clients', ['name' => 'ABC company']);

        $response = $this->put('/clients/'.$client->id, [
            'name' => 'ABC company Updated',
            'name' => $client->code,            
        ]);

        $this->assertDatabaseHas('clients', ['name' => 'ABC company']);
    
    }

    public function test_user_can_see_a_client()
    {
        $client = Client::factory()->create();
        $this->assertTrue(Client::all()->count() == 1);

        $response = $this->get('/clients/'.$client->id);
        $response->assertStatus(200);  
        $response->assertSee($client->name); 

    }

    //Delete test
    public function test_user_can_delete_a_client()
    {
        $client = Client::factory()->create();
        $this->assertTrue(Client::all()->count() == 1);

        $response = $this->delete('/clients/'.$client->id);
        $this->assertTrue(Client::all()->count() == 1);
    }

}
