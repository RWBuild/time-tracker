<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
       \DB::table('roles')->truncate();

       Role::create(['id' => 1, 'name' => 'Administration']);
       Role::create(['id' => 2, 'name' => 'Backend Development']);
       Role::create(['id' => 3, 'name' => 'Frontend Development']);
       Role::create(['id' => 4, 'name' => 'Project Management']);
       Role::create(['id' => 5, 'name' => 'Testing']);
    }
}
