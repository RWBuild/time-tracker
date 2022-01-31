<?php

namespace Tests\Feature;

use App\Models\TimeEntry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TimeEntryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_create_a_time_entry()
  {
    $response = $this->actingAs($this->user)->post('/time_entries',[
      'client_id' => 1,
      'name' => 'ABC Project',
      'description' => 'This is a description',
      'budget' => 10000.14,
    ]);

    $response->assertStatus(200);

    $this->assertTrue(TimeEntry::all()->count() == 1);
  }



}
