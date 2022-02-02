<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->truncate();

        User::create(['name' => 'User', 'email' => 'user@gmail.com', 'password' => Hash::make('user@gmail.com')])->roles()->attach(Role::IS_USER);
        User::create(['name' => 'Owner', 'email' => 'owner@gmail.com', 'password' => Hash::make('owner@gmail.com')])->roles()->attach(Role::IS_OWNER);
        User::create(['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('admin@gmail.com')])->roles()->attach(Role::IS_ADMIN);
    }
}
