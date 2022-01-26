<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Project;
use App\Models\Client;



class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/projects', [
            'name' => 'Laravel',
            'budget' => '250.0',
            'client_id' => Client::factory()->create()->id

        ]);

        $response->assertStatus(200);
        $this->assertTrue(Project::all()->count() == 1);

    }

    public function test_user_can_update_a_project()
    {
        $project = Project::factory()->create([
            'name' =>'Laravel',
        ]);

        $this->assertDatabaseHas('projects', ['name'=> 'Laravel']);

        $response = $this->put('/projects/'.$project->id, [
            'name' => 'Laraveled',
             'budget' => $project->budget,
         ]);

         $this->assertDatabaseHas('projects', ['name'=> 'Laraveled']);


            

    }

    public function test_user_can_see_a_project()
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
        $this->assertTrue(Project::all()->count() == 0);

    }
}
   
