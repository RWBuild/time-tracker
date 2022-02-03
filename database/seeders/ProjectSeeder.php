<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
<<<<<<< HEAD
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('projects')->truncate();

      Project::create(['id' => 1, "client_id" => 1, "name" => 'E-commerce', "budget" =>2000.00]);
      Project::create(['id' => 2, "client_id" => 1, "name" => 'CRM', "budget" =>1500.00]);
      Project::create(['id' => 3, "client_id" => 4, "name" => 'Hotel Management App', "budget" =>3000.00]);
    }
=======
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    \DB::table('projects')->truncate();

    Project::create(['id' => 1, "client_id" => 1, "name" => 'E-commerce', 'description'=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo dignissimos omnis, adipisci commodi.","budget" => 2000.00]);
    Project::create(['id' => 2, "client_id" => 1, "name" => 'CRM', 'description'=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo dignissimos omnis, adipisci commodi.","budget" => 1500.00]);
    Project::create(['id' => 3, "client_id" => 4, "name" => 'Hotel Management App', 'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo dignissimos omnis, adipisci commodi, eum, dicta repellat quia id quo obcaecati veniam odit culpa assumenda distinctio incidunt? Ipsa eaque voluptate necessitatibus.", "budget" => 3000.00]);
  }
>>>>>>> green/main
}
