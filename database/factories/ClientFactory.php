<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\support\str;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'code' => str::random(5),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->streetAddress.', '.$this->faker->city.', '.$this->faker->stateAbbr.', '.$this->faker->postcode(),
        ];
    }
}
