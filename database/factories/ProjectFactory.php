<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Client;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'client_id'=>1,
            // 'name'=>Str::random(10)." Project",
            // 'description'=>$this->faker->text(100),
            'name'=>$this->faker->name(),
            'client_id'=>Client::factory()->create()->id,
            'description'=>$this->faker->paragraph(),
            'budget'=>$this->faker->randomFloat(2,100,10000)
            

        ];
    }
}
