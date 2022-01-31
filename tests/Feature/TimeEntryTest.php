<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\TimeEntry;

class TimeEntryTest extends TestCase
{
    use RefreshDatabase;
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

//     public function setUp(): void
//    {
//     parent::setUp();
//     $this->project = User::factory()->create();
//     $this->project = Project::factory()->create();
    
//    }
}
