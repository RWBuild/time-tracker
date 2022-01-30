<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tasks')->truncate();

        Task::create(['id' => 1, 'name' => 'Administration']);
        Task::create(['id' => 2, 'name' => 'Backend Developmen']);
        Task::create(['id' => 3, 'name' => 'Frontend Development']);
        Task::create(['id' => 4, 'name' => 'Project Management']);
        Task::create(['id' => 5, 'name' => 'Testing']);

    }
}
