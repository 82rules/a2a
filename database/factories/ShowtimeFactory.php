<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Showtime>
 */
class ShowtimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hours = collect(range(540, 1320, 30));
        return [
            'chairs'=>rand(1,4),
            'slots'=> $hours->random(rand(3,6)),
            'price'=>rand(800,1200),
        ];
    }
}
