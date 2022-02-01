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

      Client::create(['id' => 1, "name" => 'Moise', "code" => 'A001']);
      Client::create(['id' => 2, "name" => 'EventBash', "code" => 'A002']);
      Client::create(['id' => 3, "name" => 'William', "code" =>'A003']);
      Client::create(['id' => 4, "name" => 'Guevara Mariucs', "code" => 'A004']);
      Client::create(['id' => 5, "name" => 'Don Jacob', "code" =>'A005']);
    }
}
