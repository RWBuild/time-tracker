<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Project;
use App\Models\Clients;
use App\Models\User;

class ProjectTest extends TestCase
{
  use RefreshDatabase;


  public function setUp(): void
  {
    parent::setUp();
    $this->user = User::factory()->create();

  }

  //  USER CAN CREATE A PROJECT
  public function test_user_can_create_a_project()
  {

    $response = $this->actingAs($this->user)->post('/projects',[
      'client_id' => 1,
      'name' => 'ABC Company',
      'description' => 'Test project description',
      'bugdget' => 1500.10,

    ]);

    //$response->assertStatus(200);

    $this->assertTrue(Project::all()->count() == 1);
  }

  
  // GUEST CAN NOT CREATE A PROJECT
  public function test_guest_can_not_create_a_project()
  {
    
    $response = $this->post('/projects',[
      'client_id' => 1,
      'name' => 'ABC Company',
      'description' => 'Test project description',
      'bugdget' => 1500.10,
    ]);

    //$response->assertStatus(200);

    $this->assertTrue(Project::all()->count() == 0);
  }

  // TEST USER CAN UPDATE A PROJECT
  public function test_user_can_update_a_project()
  {

    $project = Project::factory()->forClient()->create([
      'name' => 'TEST Project'
    ]);

    $this->assertDatabaseHas('projects',['name' => 'TEST Project']);

    $response = $this->actingAs($this->user)->put('/projects/'.$project->id, [
      'client_id' => 1,
      'name' => 'TEST Project update',
    ]);

    $this->assertDatabaseHas('projects',['name' => 'TEST Project update']); 
  }

  
  //GUEST CAN NOT UPDATE A PROJECT
  public function test_guest_can_not_update_a_project()
  {
    
    $project = Project::factory()->forClient()->create([
      'name' => 'TEST Project'
    ]);

    $this->assertDatabaseHas('projects',['name' => 'TEST Project']);

    $response = $this->put('/projects/'.$project->id, [
      'client_id' => 1,
      'name' => 'TEST Project update',
    ]);

    $this->assertDatabaseHas('projects',['name' => 'TEST Project']); 
  }

  //USER CAN SEE A PROJECT
  public function test_user_can_see_a_project()
  {

    $project = Project::factory()->forClient()->create();
    $this->assertTrue(Project::all()->count() == 1);

    $response = $this->actingAs($this->user)->get('/projects/'.$project->id);
    $response->assertStatus(200);
    $response->assertSee($project->name);
  }

  // USER CAN DELETE A PROJECT
  public function test_user_can_delete_a_project()
  {
    $project = Project::factory()->forClient()->create();
    $this->assertTrue(Project::all()->count() == 1);

    $response = $this->actingAs($this->user)->delete('/projects/'.$project->id);
    $this->assertTrue(Project::all()->count() == 0);

  }

  //GUEST CAN NOT DELETE A PROJECT
  public function test_guest_can_not_delete_a_project()
  {

    $project = Project::factory()->forClient()->create();
    $this->assertTrue(Project::all()->count() == 1);

    $response = $this->delete('/projects/'.$project->id);
    $this->assertTrue(Project::all()->count() == 1);

  }
 
}
