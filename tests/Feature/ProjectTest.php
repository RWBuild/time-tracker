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
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    //user create projects
    public function test_user_can_create_project()
    {
        // $this->withoutExceptionHandling();
    
            $this->post('/projects',[
            'client_id'=>'1',
            'name'=>'Stock Management',
            'budget'=>1000
            ])->assertStatus(200);

       $this->assertTrue(Project::all()->count() > 0);
      
        
    }

    //test user can see project

    public function test_user_can_see_a_project()
    {
        $project =Project::factory()->create();
        $this->assertTrue(Project::all()->count() > 0);
        $response = $this->get('/projects/'.$project->id);
        // $this->assertStatus(200);
        $response->assertSee($project->name);
    }
//user update project
//done: get one project not working
    public function test_user_can_update_project()
    {
        $project =Project::factory([
            'client_id' => '1', 
            'name' => 'Stock Management'
        ])->create();
        $this->assertDatabaseHas('projects', ['name' => 'Stock Management']);
        
        $response= $this->put('/projects/'.$project->id, [
            'client_id' => '1', 
            'name' => 'Stock Management Update'
        ]);
        $this->assertDatabaseHas('projects',  ['name'=>'Stock Management Update']);
    }
    //user can delete project 
    public function test_user_can_delete_a_project()
    {
        $project = Project::factory()->create();
        $array_count =[];
         $array_count[0] = Project::all()->count();
        $this->assertTrue(Project::all()->count() == $array_count[0] );
        var_dump($array_count[0]);
        $this->delete('projects/'.$project->id);
        $array_count[0]=Project::all()->count();
        var_dump($array_count[0]);
        $this->assertTrue(Project::all()->count() == $array_count[0]);

    }
}
