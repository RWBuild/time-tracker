<?php

namespace Tests\Feature;

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
    public function test_user_can_create_a_time_entry()
    {
        $response = $this->actingAs($this->user)->post('/time-entry', [
            "project_id" => 1,
            "user_id" => 1,
            "task_id" => 1,
            "duration" => 5,
        ]);
        $response->assertStatus(200);
        $this->assertTrue(TimeEntry::all()->count() == 1);
    }

    public function test_user_can_update_a_time_entry()
    {
        $timeEntry = TimeEntry::factory()->forUser()->forTask()->create();
        $this->assertTrue(TimeEntry::all()->count() == 1);
        $response = $this->actingAs($this->user)->put('/time-entry/' . $timeEntry->id, [
            'duration' => 5,
        ]);
        $this->assertDatabaseHas('time_entries', ['duration' => 5]);
    }
    public function test_user_can_delete_a_timeEntry()
    {
        $timeEntry = TimeEntry::factory()->forUser()->forTask()->create();
        $this->assertTrue(TimeEntry::all()->count() == 1);
        $response = $this->actingAs($this->user)->delete('/time-entry/' . $timeEntry->id);
        $this->assertTrue(TimeEntry::all()->count() == 0);
    }
}
