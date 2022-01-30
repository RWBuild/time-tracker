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
        DB::table('tasks')->truncate();
        Task::create(['id'=>1,'name'=>'administration']);
        Task::create(['id'=>2,'name'=>'backend development']);
        Task::create(['id'=>3,'name'=>'frontend development']);
        Task::create(['id'=>4,'name'=>'project development']);
        Task::create(['id'=>5,'name'=>'testing']);

    }
}
