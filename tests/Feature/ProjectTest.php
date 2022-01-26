<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();
        $response =  $this->post('/projects', [
            'name' => 'Time-tracker',
            'client_id' => Client::factory()->create()->id,
        ]);
        $response->assertStatus(200);
        $this->assertTrue(Project::all()->count() == 1);
    }

    public function test_user_can_update_a_project()
    {
        $this->withoutExceptionHandling();
        $project = Project::factory()->create([
            'name' => 'Time-tracker',
        ]);
        $this->assertDatabaseHas('projects', ['name' => 'Time-tracker']);

        $response =  $this->put('/projects/' . $project->id, [
            'name' => 'Time-tracker Updated',
            'client_id' => $project->client_id,
        ]);
        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'name' => 'Time-tracker Updated'
        ]);
    }

    public function test_user_can_see_a_project()
    {
        $this->withoutExceptionHandling();
        $project = Project::factory()->create();
        $this->assertTrue(Project::all()->count() == 1);
        $response =  $this->get('/projects/' . $project->id);
        $response->assertStatus(200);
        $response->assertSee($project->name);
    }

    public function test_user_can_delete_a_project()
    {
        $project = Project::factory()->create();
        $this->assertTrue(Project::all()->count() == 1);
        $response =  $this->delete('/projects/' . $project->id);
        $response->assertStatus(200);
        $this->assertTrue(Project::all()->count() == 0);
    }

    public function test_factory()
    {
        $project = Project::factory()->create();
        $this->assertTrue(Project::all()->count() == 1);
    }
}
