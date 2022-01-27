<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Client;
use App\Models\User;

class ClientTest extends TestCase
{
  use RefreshDatabase;
  public function setUp(): void
  {
    parent::setUp();
    $this->user = User::factory()->create();
  }
  //allow user to create client
  public function test_user_can_create_a_client()
  {
    $this->withoutExceptionHandling();
    $response = $this->actingAs($this->user)->post('/clients',[
      'name' => 'ABC Company',
      'code' => 'ABCCO'
    ]);
    $response->assertStatus(200);
    $this->assertTrue(Client::all()->count() == 1);
  }
  //stop guest from creating a client
  public function test_guest_can_not_create_a_client()
  {
    $response = $this->post('/clients',[
      'name' => 'ABC Company',
      'code' => 'ABCCO'
    ]);
    $this->assertTrue(Client::all()->count() == 0);
  }
//allow user to update client
  public function test_user_can_update_a_client()
  {
    $client = Client::factory()->create([
      'name' => 'ABC Company'
    ]);
    $this->assertDatabaseHas('clients',['name' => 'ABC Company']);
    $response = $this->actingAs($this->user)->put('/clients/'.$client->id, [
      'name' => 'ABC Company Updated',
      'code' => $client->code,
    ]);
    $this->assertDatabaseHas('clients',['name' => 'ABC Company Updated']);
  }
  //stop guest from updating client
  public function test_guest_can_not_update_a_client()
  {
    $client = Client::factory()->create([
      'name' => 'ABC Company'
    ]);
    $this->assertDatabaseHas('clients',['name' => 'ABC Company']);
    $response = $this->put('/clients/'.$client->id, [
      'name' => 'ABC Company Updated',
      'code' => $client->code,
    ]);
    $this->assertDatabaseHas('clients',['name' => 'ABC Company']); 
  }
//allow user to create client
  public function test_user_can_see_a_client()
  {
    $this->withoutExceptionHandling();
    $client = Client::factory()->create();
    $this->assertTrue(Client::all()->count() == 1);
    $response = $this->actingAs($this->user)->get('/clients/'.$client->id);
    $response->assertStatus(200);
    $response->assertSee($client->name);
  }
// allow user to delete client
  public function test_user_can_delete_a_client()
  {
    $client = Client::factory()->create();
    $this->assertTrue(Client::all()->count() == 1);
    $response = $this->actingAs($this->user)->delete('/clients/'.$client->id);
    $this->assertTrue(Client::all()->count() == 0);
  }
//stop guest from deleting client
  public function test_guest_can_not_delete_a_client()
  {
    $client = Client::factory()->create();
    $this->assertTrue(Client::all()->count() == 1);
    $response = $this->delete('/clients/'.$client->id);
    $this->assertTrue(Client::all()->count() == 1);
  }

}
