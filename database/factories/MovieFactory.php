<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
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
            'title' => $this->faker->unique()->word,
            'image_url' => $this->faker->imageUrl(),
            'published_year' => $this->faker->year,
            'description' => $this->faker->realText(20),
            'genre_id' => Genre::factory(),
            'is_showing' => $this->faker->boolean,
        ];
    }
}
