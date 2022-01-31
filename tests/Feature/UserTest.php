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

  public function setUp(): void
  {
    parent::setUp();
    $this->artisan('db:seed --class=RoleSeeder');
    $this->user = User::factory()->create();
    $this->user->roles()->attach(Role::IS_USER);
  }

  public function test_user_can_not_access_the_dashboard()
  {
    $response = $this->actingAs($this->user)->get('/dashboard');
    $response->assertStatus(403);
  }

  public function test_user_can_not_access_owner_test_page()
  {
    $response = $this->actingAs($this->user)->get('/owner');
    $response->assertStatus(403);
  }

}
