<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Project;
use App\Models\Client;

class projectTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

      $response = $this->post('/projects',[
          'name'=>'Sauna Massage',
          'client_id' => Client::factory()->create()->id,
      ]);
      $response->assertStatus(200);
       $this->assertTrue(Project::all()->count() ==1);
     
    }

    public function test_user_can_update_a_project()
    {
        $this->withoutExceptionHandling();
        $project = Project::factory()->create([
            'name' => 'Sauna Massage',
        ]);
        $this->assertDatabaseHas('projects',['name'=>'Sauna Massage']);
        $response = $this->put('/projects/'.$project->id,[
            'name' => 'Sauna Massage Update',
            'client_id'=>$project->client_id,
            'description' =>'Project Management'
        ]);
        $this->assertDatabaseHas('projects',['name'=>'Sauna Massage Update']);
    }

    public function test_user_can_delete_a_project()
    {
        $this->withoutExceptionHandling();
        $project=Project::factory()->create();
        $this->assertTrue(Project::all()->count()==1);
        $response = $this->delete('/projects/'.$project->id);
        $this->assertTrue(Project::all()->count()==0);
    }

    public function test_user_can_see_a_project()
    {
        $this->withoutExceptionHandling();
        $project=Project::factory()->create();
        $this->assertTrue(Project::all()->count()==1);
        $response=$this->get('/projects/'.$project->id);
        $response->assertStatus(200);
        $response->assertSee($project->name);
    }

}
