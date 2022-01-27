<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Client;
use App\Models\Project;

class ProjectTest extends TestCase
{
    use RefreshDataBase; 

    public function test_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/projects',[
            'id' => '1',
            'client_id' => Client::factory()->create()->id,
            'name' => 'BCA',
            'description' => 'good project',
            'badget' => '25'
        ]);

        $response->assertStatus(200);
        
        $this->assertTrue(Project::all()->count() == 1);
    }

    //update test
    public function test_user_can_update_a_project()
    {
        $project = Project::factory()->create([
            'name' => 'BCA'
        ]);

        $this->assertDatabaseHas('projects', ['name' => 'BCA']);

        $response = $this->put('/projects/'.$project->id, [
            'name' => 'BCA company',
        ]);

        $this->assertDatabaseHas('projects', ['name' => 'BCA company']);
    
    }

    public function test_user_can_see_a_project()
    {
        $project = Project::factory()->create();
        $this->assertTrue(Project::all()->count() == 1);

        $response = $this->get('/projects/'.$project->id);
        $response->assertStatus(200);  
        $response->assertSee($project->name); 

    }

    //Delete test
    public function test_user_can_delete_a_project()
    {
        $project = Project::factory()->create();
        $this->assertTrue(Project::all()->count() == 1);

        $response = $this->delete('/projects/'.$project->id);
        $this->assertTrue(Project::all()->count() == 1);
    }
}
