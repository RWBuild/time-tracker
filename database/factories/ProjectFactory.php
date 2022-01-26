<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'client_id'=>1,
            'name'=> $this->faker->sentence(2, true),
            'description' => $this->faker->paragraph(2, true),
            'budget' => $this->faker->randomFloat(2, 500, 2000),
        ];
    }
}
