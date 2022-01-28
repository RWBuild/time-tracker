<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Role;
use App\Models\Client;
use App\Models\User;

class AdminTest extends TestCase
{
    use RefreshDatabase;
    public function setup(): void
    {
   parent::setup();
    $this->artisan('db:seed --class=RoleSeeder');
    $this->admin = user::factory()->create();
    $this->admin->roles()->attach(Role::IS_ADMIN);

    }

    public function test_admin_can_access_home_page()

    {
        
        $response = $this->actingAs($this->admin)->get('/');
        $response->assertStatus(200);

    }
    public function test_admin_can_access_clients_page()

    { 
        $client= Client::factory()->create();
        $response = $this->actingAs($this->admin)->get('/clients/'.$client->id);
        $response->assertStatus(200);
        $response->assertSee($client->name);
      

    }

   
public function test_admin_can_access_dashboard_page() {

    $response = $this->actingAs($this->admin)->get('/dashboard/');
    $response->assertStatus(200);
    
}

}