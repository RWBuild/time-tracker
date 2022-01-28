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
        $this->owner->roles()->attach(Role::IS_OWNER);

    }
    
    public function test_owner_can_see_page()
    {
    $response = $this->actingAs($this->owner)->get('/owner');
    $response->assertStatus(200);
    }
}
