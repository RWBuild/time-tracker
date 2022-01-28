<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;

class OwnerTest extends TestCase
{

    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed --class=RoleSeeder');
        $this->owner = User::factory()->create();
        $this->user = User::factory()->create();
        $this->owner->roles()->attach(Role::IS_OWNER);

    }
    
    public function test_owner_can_see_owner_page()
    {
    $response = $this->actingAs($this->owner)->get('/owner');
    $response->assertStatus(200);
    }
    public function test_owner_can_not_see_dashboard()
    {
    $response = $this->actingAs($this->owner)->get('/dashboard');
    $response->assertStatus(403);
    }
    public function test_user_can_not_see_ownerpage()
    {
    $response = $this->actingAs($this->user)->get('/owner');
    $response->assertStatus(403);
    }
}
