<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\user;
use App\Models\role;

class RoleTest extends TestCase
{
    
    use RefreshDatabase; public function setup(): void
    {
   parent::setup();
    $this->artisan('db:seed --class=Roleseeder');
    $this->admin = user::factory()->create();
    $this->admin->roles()->attach(Role::IS_ADMIN);
    }


    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
