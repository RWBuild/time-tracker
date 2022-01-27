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

  //  USER CAN CREATE A CLIENT
  public function test_user_can_create_a_client()
  {

    $response = $this->actingAs($this->user)->post('/clients',[
      'name' => 'ABC Company',
      'code' => 'ABCCO'
    ]);

    $response->assertStatus(200);

    $this->assertTrue(Client::all()->count() == 1);
  }

  // GUEST CAN NOT CREATE A CLIENT
  public function test_guest_can_not_create_a_client()
  {
    
    $response = $this->actingAs($this->user)->post('/clients',[
      'name' => 'ABC Company',
      'code' => 'ABCCO'
    ]);

    $response->assertStatus(200);

    $this->assertTrue(Client::all()->count() == 1);
  }

  // TEST USER  CAN UPDATE A CLIENT
  public function test_user_can_update_a_client()
  {

    $client = Client::factory()->create([
      'name' => 'ABC Company'
    ]);

    $this->assertDatabaseHas('clients',['name' => 'ABC Company']);

    $response = $this->actingAs($this->user)->put('/clients/'.$client->id, [
      'name' => 'ABC Company',
      'code' => $client->code,
    ]);

    $this->assertDatabaseHas('clients',['name' => 'ABC Company']); 
  }

  //GUEST CAN NOT UPDATE A CLIENT
  public function test_guest_can_not_update_a_client()
  {
    
    $client = Client::factory()->create([
      'name' => 'CBA Company'
    ]);

    $this->assertDatabaseHas('clients',['name' => 'CBA Company']);

    $response = $this->put('/clients/'.$client->id, [
      'name' => 'CBA Company Updated',
      'code' => $client->code,
    ]);

    $this->assertDatabaseHas('clients',['name' => 'CBA Company']); 
  }

  //USER CAN SEE A CLIENT
  public function test_user_can_see_a_client()
  {

    $client = Client::factory()->create();
    $this->assertTrue(Client::all()->count() == 1);

    $response = $this->actingAs($this->user)->get('/clients/'.$client->id);
    $response->assertStatus(200);
    $response->assertSee($client->name);
  }

  // USER CAN DELETE A CLIENT
  public function test_user_can_delete_a_client()
  {
    $client = Client::factory()->create();
    $this->assertTrue(Client::all()->count() == 1);

    $response = $this->actingAs($this->user)->delete('/clients/'.$client->id);
    $this->assertTrue(Client::all()->count() == 0);

  }


  //GUEST CAN NOT DELETE A CLIENT
  public function test_guest_can_not_delete_a_client()
  {

    $client = Client::factory()->create();
    $this->assertTrue(Client::all()->count() == 1);

    $response = $this->delete('/clients/'.$client->id);
    $this->assertTrue(Client::all()->count() == 1);

  }

  
}
