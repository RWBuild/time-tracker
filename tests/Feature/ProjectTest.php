<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Project;

class ProjectTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_user_can_create_a_project(){
        $response = $this->post('/projects',[
            'client_id'=>1, 
            'name'=>'time tracker',
         ]);

        $response->assertStatus(200);

        $this->assertTrue(Project::all()->count() == 1);
  
    }


    public function test_user_can_update_a_project()
    {
        $project = Project::factory()->create(['name'=>'test Project']);
        $this->assertDatabaseHas('projects', ['name' =>'test Project']);

        $response = $this->put('/projects/'.$project->id, [
            'client_id' => $project->id,
            'name' => 'test Project Updated'
        ]);
        $this->assertDatabaseHas('projects', ['name' => 'test Project Updated']);
    }


    public function test_user_can_view_a_project()
    {
        $this->withoutExceptionHandling();

        $project = Project::factory()->create();
       $this->assertTrue(Project::all()->count() == 1);

       $response = $this->get('/projects/'.$project->id);

       $response->assertStatus(200);
       $response->assertSee($project->name);

    }


    public function test_user_can_delete_a_project()
    {
        $project = Project::factory()->create();
       $this->assertTrue(Project::all()->count() == 1);

       $this->delete('/projects/'.$project->id);
       $this->assertTrue(Project::all()->count() == 0 );
    }
}
