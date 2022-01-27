<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        //
        \DB::table('roles')->truncate();
        Role::create(['id'=>1,'name'=>'user']);
        Role::create(['id'=>2,'name'=>'owner']);
        Role::create(['id'=>3,'name'=>'admin']);
        Role::create(['id'=>4,'name'=>'employee']);
    }
}
