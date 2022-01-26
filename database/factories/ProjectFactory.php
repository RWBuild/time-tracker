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
            'client_id' => '1',
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'budget' => '48599.00',
        ];
    }
}
