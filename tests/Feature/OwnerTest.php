<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Role;
use App\Models\User;

class OwnerTest extends TestCase
{
    use RefreshDatabase;
     public function setup(): void
    {
        parent::setup();
         $this->artisan('db:seed --class=RoleSeeder');
         $this->owner = user::factory()->create();
         $this->owner->roles()->attach(Role::IS_OWNER);
     
         }

         public function test_owner_can_access_owner_page()
    {
        $response = $this->actingAs($this->owner)->get('/');
        $response->assertStatus(200);

    }
    public function test_owner_can_not_access_dashboard_page()

    { 
        $response = $this->actingAs($this->owner)->get('/dashboard');
        $response->assertStatus(403);
    }

    

}
