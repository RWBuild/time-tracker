<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('projects')->truncate();

      Project::create(['id' => 1, "client_id" => 1, "name" => 'E-commerce', "budget" =>2000.00]);
      Project::create(['id' => 2, "client_id" => 3, "name" => 'CRM', "budget" =>1500.00]);
      Project::create(['id' => 3, "client_id" => 4, "name" => 'Hotel Management App', "budget" =>3000.00]);
    }
}
