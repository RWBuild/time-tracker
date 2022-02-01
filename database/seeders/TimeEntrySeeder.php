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

      TimeEntry::create(['id' => 1, 'project_id' => 1, 'user_id' => 1, 'task_id' => 1, 'duration' => 21.06, 'date' => Date("y-m-d")]);
      TimeEntry::create(['id' => 2, 'project_id' => 2, 'user_id' => 2, 'task_id' => 2, 'duration' => 17.40, 'date' => Date("y-m-d")]);
      TimeEntry::create(['id' => 3, 'project_id' => 3, 'user_id' => 3, 'task_id' => 3, 'duration' => 09.52, 'date' => Date("y-m-d")]);
    }
}
