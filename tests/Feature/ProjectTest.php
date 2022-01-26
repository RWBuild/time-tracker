<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Project;

class ProjectTest extends TestCase
{
   use RefreshDatabase;
    
    public function test_user_can_create_a_project(){

        $this->withoutExceptionHandling();

        $response = $this->post('/projects',[
            'client_id'=> 1,
            'name'=>'test project',
        ]);

        $response->assertStatus(200);
        $this->assertTrue(Project::all()->count() == 1);
    }

        

    public function test_can_update_project(){
        $project = Project::factory()->create();
        $this->assertTrue(Project::all()->count() == 1);

        $this->put('/projects/'.$project->id, ['name' => 'Maker']);
        $this->assertDatabaseHas('projects', ['name' => 'Maker']);
    }

    public function test_user_can_see_a_project()
    {
        $this->withoutExceptionHandling();

        $project = project::factory()->create();
        $this->assertTrue(Project::all()->count() == 1);
        
        $response = $this->get('/projects/'.$project->id);
        $response->assertStatus(200);
        $response->assertSee($project->name);
    }    

    public function test_can_delete_project(){
        $project = Project::factory()->create();
        $this->assertTrue(Project::all()->count() == 1);

        $this->delete('/projects/'.$project->id);
        $this->assertTrue(Project::all()->count() == 0);
        //$this->assertDatabaseHas('projects', ['name' => 'Maker']);
    }

}
