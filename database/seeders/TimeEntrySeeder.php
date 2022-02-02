<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimeEntry;

class TimeEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('time_entries')->truncate();

      TimeEntry::create(['id' => 1, "project_id" => 1, 'user_id'=>1, 'task_id'=>1, 'duration'=>120, 'date'=>'2022-03-12 14:17:57']);
      TimeEntry::create(['id' => 2, "project_id" => 1, 'user_id'=>2, 'task_id'=>2, 'duration'=>60, 'date'=>'2022-03-12 14:17:57']);
      TimeEntry::create(['id' => 3, "project_id" => 1, 'user_id'=>1, 'task_id'=>1, 'duration'=>120, 'date'=>'2022-03-12 14:17:57']);
      TimeEntry::create(['id' => 4, "project_id" => 2, 'user_id'=>2, 'task_id'=>1, 'duration'=>120, 'date'=>'2022-03-12 14:17:57']);
      TimeEntry::create(['id' => 5, "project_id" => 2, 'user_id'=>2, 'task_id'=>2, 'duration'=>60, 'date'=>'2022-03-12 14:17:57']);
      TimeEntry::create(['id' => 6, "project_id" => 2, 'user_id'=>2, 'task_id'=>1, 'duration'=>120, 'date'=>'2022-03-12 14:17:57']);
    
    }
}

