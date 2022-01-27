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
            'name'=>$this->faker->company(),
            // 'client_id'=>$this->faker->numberBetween(1,10),
            'description'=>$this->faker->text(),
            'budget'=>$this->faker->randomFloat()
        ];
    }
}
