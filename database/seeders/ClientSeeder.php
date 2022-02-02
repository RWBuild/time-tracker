<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncates
        DB::table('users')->truncate();
        DB::table('role_user')->truncate();
        DB::table('clients')->truncate();
        DB::table('projects')->truncate();
        //Users
        User::create(['name' => 'User', 'email' => 'user@gmail.com', 'password' => Hash::make(12345678)])->roles()->attach(Role::IS_USER);
        User::create(['name' => 'Owner', 'email' => 'owner@gmail.com', 'password' => Hash::make(12345678)])->roles()->attach(Role::IS_OWNER);
        User::create(['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => Hash::make(12345678)])->roles()->attach(Role::IS_ADMIN);
        //Clients and Projects
        Client::factory()->hasProjects(4)->create();
        Client::factory()->hasProjects(4)->create();
        Client::factory()->hasProjects(4)->create();
    }
}
