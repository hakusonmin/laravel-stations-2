<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PracticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        static $count = 1;

        return [
            'id' => $count++,
            'title' => $this->faker->realText(10),
        ];
    }
}