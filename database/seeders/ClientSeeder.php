<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('clients')->truncate();

      Client::create(['id' => 1, 'name' => 'ABC Company','code'=>'ABCCO','address'=>'Rwanda,Kigali','phone'=>'0788345678']);
      Client::create(['id' => 2, 'name' => 'RWBuild','code'=>'RWB','address'=>'Rwanda,Kigali','phone'=>'0788365678']);
      Client::create(['id' => 3, 'name' => 'IKAWA coffee','code'=>'IKCO','address'=>'Rwanda,Kigali','phone'=>'0788355678']);
 
    }
}
