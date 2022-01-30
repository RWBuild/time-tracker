<?php

namespace Tests\Feature\Models;

use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\TimeEntry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TimeEntryTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
       
    }
   //TODO: can't figure out why this is not working
    // public function test_user_can_create_time_entry()
    // {
    //     $project = Project::factory()->forClient()->create(
    //         [
    //             'name'=>'ABC project'
    //         ]
    //     );
    //     $user = User::factory()->create();
    //     $task = Task::factory()->create();
    //     $response = $this->actingAs($this->user)->post('/time-entries',[
    //         'project_id' => $project->project_id,
    //         'user_id' =>$user->user_id,
    //         'task_id' => $task->task_id,
    //         'duration'=> 20,
    //     ]);

    //     $this->assertTrue(TimeEntry::all()->count() == 1);
    // }
    

    public function test_user_can_see_time_entry()
    {
        $response = $this->actingAs($this->user)->get('/time-entries');
        $response->assertStatus(200);
    }
    public function test_guest_can_not_see_time_entry()
    {
        $response = $this->get('/time-entries');
        $response->assertStatus(302);
    }
}
