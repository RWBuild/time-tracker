<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Project;
use App\Models\Client;





class ProjectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();
        
        $response = $this->post('/projects',[
           'name' => 'ABC Project', 
           'client_id' => 1,
           'description' => "hhhhh",
           'budget' => 12.12,
        ]);

        $response->assertStatus(200);
        $this->assertTrue(Project::all()->count() == 1);
    } 

    public function test_user_can_update_a_project()
    {
        $this->withoutExceptionHandling();
        $project = Project::factory()->forClient()->create(['name'=>'ABC Project']);
        $this->assertDatabaseHas('projects',['name' => 'ABC Project']);
        $response = $this->put('/projects/'.$project->id,[
            'name' => 'ABC Project updated',
        ]);
        
        $this->assertDatabaseHas('projects',['name' => 'ABC Project updated']);


    }

    public function test_user_can_view_a_project()
    {
        $this->withoutExceptionHandling();
        $project = Project::factory()->forClient()->create();
        $this->assertTrue(Project::all()->count() == 1);
        $response = $this->get('/projects/'.$project->id);
        $response->assertStatus(200);
        $response->assertSee($project->name);

    }

    public function test_user_can_delete_a_project()
    {
        $project = Project::factory()->forClient()->create();
       $this->assertTrue(Project::all()->count() == 1);
       $this->delete('/projects/'.$project->id);
       $this->assertTrue(Project::all()->count() == 0 );
    }
}
