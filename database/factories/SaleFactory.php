<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
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
            'slot'=>$hours->random(),
            'cost'=>rand(800,4800),
            'created_at'=>$this->faker->dateTimeBetween('-2 month', 'now'),
        ];
    }
}
