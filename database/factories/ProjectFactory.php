<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        
          "name" => Str::random(10)." Project",
          "description" => $this->faker->text(200),
          "budget" => $this->faker->randomFloat(2,100,10000),
        ];
    }
}
