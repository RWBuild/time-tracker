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

         Project::create(['id' => 1, 'client_id'=>1, 'name' => 'time-tracker','description'=>'it will tracking the time','budget'=>10000]);
         Project::create(['id' => 2, 'client_id'=>2,'name' => 'time-tracker1','description' => 'it will tracking the time one','budget'=>20000]);
         Project::create(['id' => 3, 'client_id'=>3, 'name' => 'time-tracker2','description'=>'it will tracking the time2','budget'=>30000]);
        } 
            
       // Project::factory()->count(4)->create();
       
}
