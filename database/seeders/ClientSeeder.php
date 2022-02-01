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
        //Users
        DB::table('users')->truncate();
        DB::table('role_user')->truncate();


        $user2 = User::create(['name' => 'Owner', 'email' => 'owner@gmail.com', 'password' => Hash::make(12345678)]);
        $user2->roles()->attach(Role::IS_OWNER);
        $user3= User::create(['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => Hash::make(12345678)]);
        $user3->roles()->attach(Role::IS_ADMIN);
        $user1 = User::create(['name' => 'User', 'email' => 'user@gmail.com', 'password' => Hash::make(12345678)]);
        $user1->roles()->attach(Role::IS_USER);
        //Clients
        DB::table('clients')->truncate();
        $client1 = Client::create(['name' => 'Prince', 'code' => 'RWB101', 'address' => 'Kigali city', 'phone' => '+250788888']);
        $client2 = Client::create(['name' => 'Philipe', 'code' => 'RWB102', 'address' => 'Kigali city', 'phone' => '+250788888']);
        $client3 = Client::create(['name' => 'Robert', 'code' => 'RWB103', 'address' => 'Kigali city', 'phone' => '+250788888']);

        //Projects
        DB::table('projects')->truncate();
        Project::factory(4)->create(['client_id' => $client1->id]);
        Project::factory(4)->create(['client_id' => $client2->id]);
        Project::factory(4)->create(['client_id' => $client3->id]);
    }
}
