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

        Task::create(['id'=>1, 'name'=>'administration']);
        Task::create(['id'=>2, 'name'=>'backend development']);
        Task::create(['id'=>3, 'name'=>'frontend development']);
        Task::create(['id'=>4, 'name'=>'testing']);
    }
}
