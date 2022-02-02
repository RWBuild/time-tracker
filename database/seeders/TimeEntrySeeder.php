<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\TimeEntry;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time_entries')->truncate();
        $projects = Project::all();
        foreach( $projects as $project){
            TimeEntry::factory(3)->create(['project_id' =>$project->id]);
        }
        
    }
}
