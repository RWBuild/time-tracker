<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
use App\Models\Client;

class OwnerTest extends TestCase
{
   use RefreshDatabase;

   public function setUp(): void{
    parent::setUp();
    $this->artisan('db:seed --class=RoleSeeder');
    $this->owner = User::factory()->create();
    $this->owner->roles()->attach(Role::IS_OWNER);
}

public function test_owner_can_access_clients_page(){
    $client = Client::factory()->create();
    $this->assertTrue(Client::all()->count() ==1);

    $response = $this->actingAs($this->owner)->get('/clients/'.$client->id);
    $response->assertStatus(200);
    $response->assertSee($client->name);
}


public function test_owner_can_access_owner_page(){
    $response = $this->actingAs($this->owner)->get('/owner');
    $response->assertStatus(200);
}

public function test_owner_can_not_access_dashoard_page(){
    $response = $this->actingAs($this->owner)->get('/dashboard');
    $response->assertStatus(403);
}

}
