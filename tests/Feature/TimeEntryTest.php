<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
use App\Models\TimeEntry;

class TimeEntryTest extends TestCase
{
  use RefreshDatabase;

  public function setUp(): void
  {
    parent::setUp();
    $this->artisan('db:seed --class=RoleSeeder');
    $this->user = User::factory()->create();
    $this->user->roles()->attach(Role::IS_USER);
  }

  public function test_user_can_create_time_entry()
  {
    //$this->withoutExceptionHandling();

    $response = $this->actingAs($this->user)->post('/time-entries',[
      'project_id' => 1,
      'task_id' => 1,
      'duration' => 60,
      'date' => Date('Y-m-d'),
    ]);

    $response->assertStatus(200);
    $this->assertTrue(TimeEntry::all()->count() == 1);
  }

  public function test_user_can_not_add_a_string_for_duration_value()
  {
    //$this->withoutExceptionHandling();
    $response = $this->actingAs($this->user)->post('/time-entries',[
      'project_id' => 1,
      'task_id' => 1,
      'duration' => 'abc',
      'date' => Date('Y-m-d'),
    ]);
    
    $this->assertTrue(TimeEntry::all()->count() == 0);
    $response->assertStatus(302);
    $response->assertSessionHasErrors();
  }

  public function test_user_can_add_duration_with_colon_format()
  {
    $response = $this->actingAs($this->user)->post('/time-entries',[
      'project_id' => 1,
      'task_id' => 1,
      'duration' => '1:30',
      'date' => Date('Y-m-d'),
    ]);

    $response->assertStatus(200);
    $this->assertTrue(TimeEntry::all()->count() == 1);
    $this->assertDatabaseHas('time_entries',['duration' => 90]);
  }

  public function test_user_can_add_duration_with_decimal_format()
  {
    $response = $this->actingAs($this->user)->post('/time-entries',[
      'project_id' => 1,
      'task_id' => 1,
      'duration' => '1.5',
      'date' => Date('Y-m-d'),
    ]);

    $response->assertStatus(200);
    $this->assertTrue(TimeEntry::all()->count() == 1);
    $this->assertDatabaseHas('time_entries',['duration' => 90]);
  }

  public function test_user_can_update_time_entry()
  {
    $timeEntry = TimeEntry::factory()->create([
      'duration' => '1.5',
    ]);
    
    $this->assertTrue(TimeEntry::all()->count() == 1);
    $this->assertDatabaseHas('time_entries',['duration' => 90]);
    
    $response = $this->actingAs($this->user)->put('/time-entries/'.$timeEntry->id,[
      'project_id' => $timeEntry->project_id,
      'task_id' => $timeEntry->task_id,
      'duration' => '2.0',
      'date' => $timeEntry->date,
    ]);

    $this->assertTrue(TimeEntry::all()->count() == 1);
    $this->assertDatabaseHas('time_entries',['duration' => 120]);

  }

}
