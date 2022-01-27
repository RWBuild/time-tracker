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
            //'client_id'=> Client::factory()->create()->id,
            'name'=>$this->faker->name(),
            'description'=>$this->faker->text(),
            'budget'=>$this->faker->randomFloat(3,0, 100),
        ];
    }
}
