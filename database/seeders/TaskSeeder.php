<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        Task::create(['name' => 'Administration']);
        Task::create(['name' => 'Backend Development']);
        Task::create(['name' => 'Frontend Development']);
        Task::create(['name' => 'Project Management']);
        Task::create(['name' => 'Testing']);
    }
}
