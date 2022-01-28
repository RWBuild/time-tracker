<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();
        $this->artisan('db:seed --class=RoleSeeder');
        $this->user = User::factory()->create();
        $this->user->roles()->attach(Role::IS_USER);
    }

    //USER CAN NOT ACCESS DASHBOARD PAGE
    public function test_user_can_not_acces_the_dashboard()
    {
        $response = $this->actingAS($this->user)->get('/dashboard');
        $response->assertStatus(403);

    }
    
    //USER CAN NOT ACCESS OWNER PAGE
    public function test_user_can_not_acces_the_owner_page()
    {
        $response = $this->actingAS($this->user)->get('/owner');
        $response->assertStatus(403);

    }
}
