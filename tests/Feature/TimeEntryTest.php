<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\TimeEntry;

class timeEntreyTest extends TestCase
{
    use RefreshDatabase;

    public function test_time_entry()
    {
        $this->assertTrue(true);
    }

   
    
}