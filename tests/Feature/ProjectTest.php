<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Client;
use App\Models\Project;


class ProjectTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();;
        $response = $this->post('/projects',[
            'name' => 'ABC Company',
            'client_id'=>Client::factory()->create()->id,
        ]);

        $response->assertStatus(200);
        $this->assertTrue(Project::all()->count() == 1); 
    }

    //TODO: This test failed. Remember, don't push up your changes unless you run your tests and they pass.
    // Looks like a typo on the project name

    public function test_user_can_update_a_project(){
        $this->withoutExceptionHandling();
        $project= project::factory()->create([
            'name' => '=',
    
        ]);
        $this->assertDatabaseHas('projects',['name' => 'time-tracker']);
        $response = $this->put('/projects/'.$project->id,[
            'name' => 'time-tracker  project Update',
            'client_id' =>$project->client_id,
            'description' => 'laravel project'
        ]);
        $this->assertDatabaseHas('projects',['name' => 'time-tracker  project Update']);
    
    
    }
    public function test_user_can_delete_a_project()
    { 
        $this->withoutExceptionHandling();
       $project= Project::factory()->create();
       $this->assertTrue(Project::all()->count() == 1);
    
       $response = $this->delete('/projects/'.$project->id);   
    
       $this->assertTrue(Project::all()->count() == 0);
    }
    public function test_user_can_see_a_project(){
        $this->withoutExceptionHandling();
        $project= Project::factory()->create();
        $this->assertTrue(Project::all()->count() == 1);
        $response = $this->get('/projects/'.$project->id);   
        $response->assertStatus(200);
        $response->assertSee($project->name);
    
        
    }
    

}
