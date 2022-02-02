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

      Client::create(['id' => 1, "name" => 'Moise Company', "code" => 'A001']);
      Client::create(['id' => 2, "name" => 'Alice Company', "code" => 'A002']);
      Client::create(['id' => 3, "name" => 'William Company', "code" =>'A003']);
      Client::create(['id' => 4, "name" => 'Guevara Marius Company', "code" => 'A004']);
      Client::create(['id' => 5, "name" => 'Don Jacob Company', "code" =>'A005']);
    }
}
