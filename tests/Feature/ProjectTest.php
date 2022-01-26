<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class ProjectTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_create_a_project ()
    {
        $this->withoutExceptionHandling();
        $response= $this->post('/projects', ['client_id' => 1,'name' => 'Test project']);
        $response->assertStatus(200);
        $this->assertTrue(Project::all()->count()==1);
    }
    public function test_user_can_update_a_project()
    {
        $this->withoutExceptionHandling();
        $project=Project::factory()->create(['name'=>'ABC Project']);
        $this->assertDatabaseHas('projects',['name'=>'ABC Project']);
        // dd($project);
        $response= $this->put('/projects/'.$project->id, [
            'name' => 'ABC Project Updated',
            'client_id'=>$project->client_id
    ]);
    $this->assertDatabaseHas('projects',['name'=>'ABC Project Updated']);

    }
    public function test_user_can_delete_a_project()
    {
        $this->withoutExceptionHandling();
        $project= Project::factory()->create();
        $this->assertTrue(Project::all()->count()==1);
        $response= $this->delete('/projects/'.$project->id);
        $this->assertTrue(Project::all()->count()==0);
    }
    public function test_user_can_see_a_project ()
    {
        $this->withoutExceptionHandling();
        $project= Project::factory()->create();
        $this->assertTrue(Project::all()->count()==1);
        $response= $this->get('/projects/'.$project->id);
        $response->assertStatus(200);
        // dd($response);
        $response->assertSee($project->name);
    }
}
