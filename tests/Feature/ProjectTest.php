<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Project;

class ProjectTest extends TestCase {
    use RefreshDatabase;

   /**
    * can create project
    */
    public function test_can_create_project(){
        $this->post('/projects', [
           'client_id' => '1',
           'name' => 'Ellen',
           'description' => 'Some description here'
        ])->assertStatus(200);

        $this->assertTrue(Project::all()->count() == 1);
    }

    // test show project
    public function test_can_read_project(){
        $project = Project::factory()->create();
        $this->assertTrue(Project::all()->count() == 1);
        $res = $this->get('/projects/'.$project->id)->assertStatus(200);
        $res->assertSee($project->name);
    }

    // test update
    public function test_can_update_project(){
        $project = Project::factory(['name' => 'Mirror'])->forClient()->create();
        $this->assertDatabaseHas('projects', ['name' => 'Mirror']);

        $this->put('/projects/'.$project->id, [
            'client_id' => '1',
            'name' => 'Lock Mirror',
            'description' => "Make some desc down here"
        ]);
        $this->assertDatabaseHas('projects', ['name' => 'Lock Mirror']);
    }

    // test delete
    public function test_can_delete_project(){
        $project = Project::factory()->create();
        $this->assertTrue(Project::all()->count() == 1);

        $this->delete('/projects/'.$project->id);
        $this->assertTrue(Project::all()->count() == 0);
    }
}
