<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('projects')->truncate();

        Project::create(['id' => 1,'client_id' => 1, "name" => 'TimeTracker', 'description' => 'This is TimeTracker', 'budget' => 4500]);
        Project::create(['id' => 2,'client_id' => 1, "name" => 'ShowApp', 'description' => 'This is ShowApp', 'budget' => 2200]);
        Project::create(['id' => 3,'client_id' => 1, "name" => 'E-commerce', 'description' => 'This is e-commerce', 'budget' => 2000]);

        Project::create(['id' => 4,'client_id' => 2, "name" => 'Employee Management', 'description' => 'This is Employee management', 'budget' => 1800]);
        Project::create(['id' => 5,'client_id' => 2, "name" => 'Stock managent', 'description' => 'This is Stock management', 'budget' => 2000]);

        Project::create(['id' => 6,'client_id' => 3, "name" => 'MakeMoney', 'description' => 'This is MakeMoney App', 'budget' => 4000]);
        Project::create(['id' => 7,'client_id' => 4, "name" => 'Move Faster', 'description' => 'This is Move Faster', 'budget' => 2500]);
 
    }
}
