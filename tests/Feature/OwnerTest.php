<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OwnerTest extends TestCase {
    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        $this->artisan('db:seed --class=RoleSeeder'); // run seed for this role
        $this->owner = User::factory()->create(); // generate user
        $this->owner->roles()->attach(Role::IS_OWNER); // attach created user as role -> IS_OWNER
    }

    public function test_owner_can_access_owner_page(){
       $response = $this->actingAs($this->owner)->get('/owner');
       $response->assertStatus(200);
    }

    public function test_owner_can_not_access_dashboard(){
       $response = $this->actingAs($this->owner)->get('/dashboard');
       $response->assertStatus(403);
    }
}
