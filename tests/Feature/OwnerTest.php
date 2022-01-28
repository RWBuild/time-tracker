<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use App\Models\Owner;


class OwnerTest extends TestCase
{
    use RefreshDatabase;
    
    public function setUp() : void
    {
        parent::setUp();
        $this->artisan('db:seed --class=RoleSeeder');
        $this->owner = User::factory()->create();
        $this->owner->roles()->attach(Role::IS_OWNER);
    }

    //OWNER CAN ACCESS THE OWNER PAGE

    public function test_owner_can_access_owner_page()
    {
       
        $response = $this->actingAs($this->owner)->get('/owner');
        $response->assertStatus(200);
    }

    //OWNER CAN NOT ACCESS THE DASHBOARD PAGE
    public function test_owner_can_not_access_dashboard_page()
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(302);
    }

}
