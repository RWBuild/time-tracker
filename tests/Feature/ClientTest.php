<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Client;

class ClientTest extends TestCase
{
   use RefreshDatabase;
   public function test_user_can_create_a_client()
   {
       $this->withoutExceptionHandling();
       $response = $this->post('/clients',[
           'name' => 'ABC Company', 
           'code' => 'ABCCO'
        ]);

        $response->assertStatus(200);

       $this->assertTrue(Client::all()->count() == 1);
   }

   public function test_user_can_update_a_client()
   {
       $this->withoutExceptionHandling();

       $client = Client::factory()->create([
           'name' => 'ABC Company'
       ]);

       $this->assertDatabaseHas('clients',['name' => 'ABC Company']);

       $response = $this->put('/clients/'.$client->id,[
           'name' => 'ABC Company updated', 
           'code' => $client->code, 
        ]);
        
        $this->assertDatabaseHas('clients',['name' => 'ABC Company updated']);
   }

   public function test_user_can_view_a_client()
   {
       $this->withoutExceptionHandling();
       $client = Client::factory()->create();
       $this->assertTrue(Client::all()->count() == 1);

       $response = $this->get('/clients/'.$client->id);

       $response->assertStatus(200);
       $response->assertSee($client->name);
   }

   public function test_user_can_delete_a_client()
   {
       $client = Client::factory()->create();
       $this->assertTrue(Client::all()->count() == 1);
       $this->delete('/clients/'.$client->id);
       $this->assertTrue(Client::all()->count() == 0 );
   }
}
