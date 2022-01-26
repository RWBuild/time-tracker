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
            
            'client_id' => '1',
            'name'=>$this->faker->name(),
            'description'=>$this->faker->paragraph(1, true),
            'budget'=>'1000.00',
        ];
    }
}
