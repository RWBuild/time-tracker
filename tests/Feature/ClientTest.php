<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Client;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;

class ClientTest extends TestCase
{
  use RefreshDatabase;

  public function setUp(): void
  {
    parent::setUp();
    $this->artisan('db:seed --class=RoleSeeder');
    $this->user = User::factory()->create();
    $this->user->roles()->attach(Role::IS_USER);
    $this->owner = User::factory()->create();
    $this->owner->roles()->attach(Role::IS_OWNER);
  }

  public function test_owner_can_create_a_client()
  {
    $response = $this->actingAs($this->owner)->post('/clients',[
      'name' => 'ABC Company',
      'code' => 'ABCCO'
    ]);

    $response->assertStatus(200);
    $this->assertTrue(Client::all()->count() == 1);
  }

  public function test_user_can_not_create_a_client()
  {
    $response = $this->actingAs($this->user)->post('/clients',[
      'name' => 'ABC Company',
      'code' => 'ABCCO'
    ]);

    $response->assertStatus(403);
    $this->assertTrue(Client::all()->count() == 0);
  }

  public function test_guest_can_not_create_a_client()
  {
    $response = $this->post('/clients',[
      'name' => 'ABC Company',
      'code' => 'ABCCO'
    ]);

    $this->assertTrue(Client::all()->count() == 0);
  }

  public function test_owner_can_update_a_client()
  {
    $client = Client::factory()->create([
      'name' => 'ABC Company'
    ]);

    $this->assertDatabaseHas('clients',['name' => 'ABC Company']);

    $response = $this->actingAs($this->owner)->put('/clients/'.$client->id, [
      'name' => 'ABC Company Updated',
      'code' => $client->code,
    ]);

    $response->assertStatus(200);
    $this->assertDatabaseHas('clients',['name' => 'ABC Company Updated']);
    
  }

  public function test_user_can_not_update_a_client()
  {
    $client = Client::factory()->create([
      'name' => 'ABC Company'
    ]);

    $this->assertDatabaseHas('clients',['name' => 'ABC Company']);

    $response = $this->actingAs($this->user)->put('/clients/'.$client->id, [
      'name' => 'ABC Company Updated',
      'code' => $client->code,
    ]);
    
    $response->assertStatus(403);
    $this->assertDatabaseHas('clients',['name' => 'ABC Company']);
    
  }

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

  public function test_user_can_see_a_client()
  {
    $client = Client::factory()->create();
    $this->assertTrue(Client::all()->count() == 1);

    $response = $this->actingAs($this->user)->get('/clients/'.$client->id);
    $response->assertStatus(200);
    $response->assertSee($client->name);
  }

  public function test_owner_can_delete_a_client()
  {
    $client = Client::factory()->create();
    $this->assertTrue(Client::all()->count() == 1);

    $response = $this->actingAs($this->owner)->delete('/clients/'.$client->id);
    $this->assertTrue(Client::all()->count() == 0);
  }

  public function test_user_can_not_delete_a_client()
  {
    $client = Client::factory()->create();
    $this->assertTrue(Client::all()->count() == 1);

    $response = $this->actingAs($this->user)->delete('/clients/'.$client->id);
    $this->assertTrue(Client::all()->count() == 1);
  }

  public function test_guest_can_not_delete_a_client()
  {
    $client = Client::factory()->create();
    $this->assertTrue(Client::all()->count() == 1);

    $response = $this->delete('/clients/'.$client->id);
    $this->assertTrue(Client::all()->count() == 1);

  }
  public function test_clients_project_are_deleted_when_client_is_deleted()
  {
    $client=Client::factory()->hasProjects(4)->create();
    $otherclient=Client::factory()->hasProjects(3)->create();
    $this->assertTrue(Client::all()->count()==2);
    $this->assertTrue(Project::all()->count()==7);
    $response = $this->actingAs($this->owner)->delete('/clients/'.$client->id);
    $this->assertTrue(Client::all()->count() == 1);
    $this->assertTrue(Project::all()->count() == 3);
  }

}

