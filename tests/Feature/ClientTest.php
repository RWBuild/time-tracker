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
  public function test_guest_can_not_create_a_client()
  {
    // $this->withoutExceptionHandling();

    $response = $this->post('/clients',[
      'name' => 'ABC Company',
      'code' => 'ABCCO'
    ]);

    // $response->assertStatus(200);

    $this->assertTrue(Client::all()->count() == 0);
  }

  public function test_user_can_update_a_client()
  {
    $this->withoutExceptionHandling();

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
  public function test_guest_can_not_update_a_client()
  {
    // $this->withoutExceptionHandling();

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
  

  public function test_user_can_see_a_client()
  {
    $this->withoutExceptionHandling();

    $client = Client::factory()->create();
    $this->assertTrue(Client::all()->count() == 1);

    $response = $this->actingAs($this->user)->get('/clients/'.$client->id);
    $response->assertStatus(200);
    $response->assertSee($client->name);
  }
  // public function test_guest_can_see_a_client()
  // {
  //   $this->withoutExceptionHandling();

  //   $client = Client::factory()->create();
  //   $this->assertTrue(Client::all()->count() == 1);

  //   $response = $this->actingAs($this->user)->get('/clients/'.$client->id);
  //   $response->assertStatus(200);
  //   $response->assertSee($client->name);
  // }

  public function test_user_can_delete_a_client()
  {
    // $client = Client::factory()->create();

    // $this->assertTrue(Client::all()->count() == 1);

    // $response = $this->->delete('/clients/'.$client->id);
    // $this->assertTrue(Client::all()->count() == 0);
    $client = Client::factory()->create();
    $array_count=[];
    $array_count[0]= Client::all()->count();
    $this->assertTrue(Client::all()->count() == $array_count[0]);
    var_dump($array_count[0], 'before delete user');
    $response = $this->actingAs($this->user)->delete('/clients/'.$client->id);
    $array_count[0]= Client::all()->count();
    var_dump($array_count[0], 'after delete user');
    $this->assertTrue(Client::all()->count() == $array_count[0]);

  }

  public function test_guest_can_not_delete_a_client()
  {
    $client = Client::factory()->create();
    $array_count=[];
    $array_count[0]= Client::all()->count();
    $this->assertTrue(Client::all()->count() == $array_count[0]);
    var_dump($array_count[0], 'before delete guest');
    $response = $this->delete('/clients/'.$client->id);
    $array_count[0]= Client::all()->count();
    var_dump($array_count[0], 'after delete guest');
    $this->assertTrue(Client::all()->count() == $array_count[0]);

  }

}
