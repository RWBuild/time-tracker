<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Project;
use App\Models\User;
use App\Models\Role;

class ProjectTest extends TestCase
{
  use RefreshDatabase;


  public function setUp(): void{
    parent::setUp();
    $this->artisan('db:seed --class=RoleSeeder');
    
    $this->user = User::factory()->create();
    $this->user->roles()->attach(Role::IS_USER);

    $this->owner = User::factory()->create();
    $this->owner->roles()->attach(Role::IS_OWNER);

  }


  public function test_user_can_not_create_a_project()
  {
    //$this->withoutExceptionHandling();

    $response = $this->actingAs($this->user)->post('/projects',[
      'client_id' => 1,
      'name' => 'ABC Project',
      'description' => 'This is a description',
      'budget' => 10000.14,
    ]);

    $response->assertStatus(403);

    $this->assertTrue(Project::all()->count() == 0);
  }

  public function test_owner_can_create_a_project()
  {
    //$this->withoutExceptionHandling();

    $response = $this->actingAs($this->owner)->post('/projects',[
      'client_id' => 1,
      'name' => 'ABC Project',
      'description' => 'This is a description',
      'budget' => 10000.14,
    ]);

    $response->assertStatus(200);

    $this->assertTrue(Project::all()->count() == 1);
  }



  public function test_guest_can_not_create_a_project()
  {
    // $this->withoutExceptionHandling();

    $response = $this->post('/projects',[
      'client_id' => 1,
      'name' => 'ABC Project',
      'description' => 'This is a description',
      'budget' => 10000.14,
    ]);

    $response->assertStatus(302);
    $response->assertRedirect("login");
    $this->assertTrue(Project::all()->count() ==0);
    
  }


  public function test_user_can_not_update_a_project()
  {
    $this->withoutExceptionHandling();

    $project = Project::factory()->forClient()->create([
      'name' => 'ABC Project'
    ]);

    $this->assertDatabaseHas('projects',['name' => 'ABC Project']);

    $response = $this->actingAs($this->user)->put('/projects/'.$project->id, [
      'client_id' => $project->client_id,
      'name' => 'ABC Project Updated',
    ]);

    $this->assertDatabaseHas('projects',['name' => 'ABC Project Updated']);
    
  }

  public function test_owner_can_update_a_project()
  {
    $this->withoutExceptionHandling();

    $project = Project::factory()->forClient()->create([
      'name' => 'ABC Project'
    ]);

    $this->assertDatabaseHas('projects',['name' => 'ABC Project']);

    $response = $this->actingAs($this->owner)->put('/projects/'.$project->id, [
      'client_id' => $project->client_id,
      'name' => 'ABC Project Updated',
    ]);

    $this->assertDatabaseHas('projects',['name' => 'ABC Project Updated']);
    
  }

  public function test_guest_can_not_update_a_project()
  {
    //$this->withoutExceptionHandling();

    $project = Project::factory()->forClient()->create([
      'name' => 'ABC Project'
    ]);

    $this->assertDatabaseHas('projects',['name' => 'ABC Project']);

    $response = $this->put('/projects/'.$project->id, [
      'client_id' => $project->client_id,
      'name' => 'ABC Project Updated',
    ]);

    $this->assertDatabaseHas('projects',['name' => 'ABC Project']);
    
  }

  public function test_user_can_see_a_project()
  {
    //$this->withoutExceptionHandling();

    $project = Project::factory()->forClient()->create();
    $this->assertTrue(Project::all()->count() == 1);

    $response = $this->actingAs($this->user)->get('/projects/'.$project->id);
    $response->assertStatus(200);
    $response->assertSee($project->name);

  }


  
  public function test_user_can_not_delete_a_project()
  {
    $project = Project::factory()->forClient()->create();

    $response = $this->actingAs($this->user)->delete('/projects/'.$project->id);
    $response->assertStatus(403);
    $this->assertTrue(Project::all()->count() == 1);

  }


  public function test_owner_can_delete_a_project()
  {
    $project = Project::factory()->forClient()->create();
    $this->assertTrue(Project::all()->count() == 1);

    $response = $this->actingAs($this->owner)->delete('/projects/'.$project->id);
    $this->assertTrue(Project::all()->count() == 0);

  }


  public function test_guest_can_not_delete_a_project()
  {
    $project = Project::factory()->forClient()->create();
    $this->assertTrue(Project::all()->count() == 1);

    $response = $this->delete('/projects/'.$project->id);
    $this->assertTrue(Project::all()->count() == 1);

  }

}
