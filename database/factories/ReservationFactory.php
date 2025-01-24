<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\Sheet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\CarbonImmutable;

class ReservationFactory extends Factory
{
      /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        static $count = 1;
        static $count2 = 1;

        return [
            'id' => $count++,
            'date' => CarbonImmutable::now()->format('Y-m-d'),
            'schedule_id' => Schedule::factory(),
            'sheet_id' => $count2++,
            'email' => $this->faker->email,
            'name' => $this->faker->unique()->word,
            'is_canceled' => $this->faker->boolean,
        ];
    }
}