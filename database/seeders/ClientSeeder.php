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

      Client::create(['id' => 1, "name" => 'SanTech', 'code' => 'ANHR', 'address' => 'Kimihurura KG 23 ave 132']);
      Client::create(['id' => 2, "name" => 'RwandaTech', 'code' => 'cSfT', 'address' => 'Kakiru KG 22 ave 92']);
      Client::create(['id' => 3, "name" => 'TechUp', 'code' => 'MnjY', 'address' => 'Kiyovu KN 30 ave 7']);
      Client::create(['id' => 4, "name" => 'BoomTech', 'code' => 'ANHQ', 'address' => 'Kicukiro KK 40 ave 172']);        
    }
}
