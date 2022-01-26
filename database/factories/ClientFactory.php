<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use illuminate\Support\str;
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
            'name'=>$this->faker->Company(),
            'code'=>Str::random(5),
            'phone'=>$this->faker->phonenumber(),
            'address'=>$this->faker->streetAddress()
        ];
    }
}
