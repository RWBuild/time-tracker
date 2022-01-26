<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
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
            'client_id' => Client::factory()->create()->id,
            'name' => $this->faker->sentence( 3, true) ,
            'description' => $this->faker->paragraph(3, true),
            'budget' => $this->faker->randomFloat(2,10000,99999),
        ];
    }
}
