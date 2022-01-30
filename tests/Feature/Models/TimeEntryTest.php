<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\project;
//use App\Models\task;

class TimeEntry extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void{
        parent::setUp();
        $this-> user =User::factory()->create();
    }

    public function test_user_can_see_time_entry(){
        $response = $this->actingAs($this->user)->get('/time-entries');
        $response->assertStatus(200);
    }

    public function test_user_can_not_see_time_entry(){
        $response = $this->get('/time-entries');
        $response->assertStatus(302);
    }


}
