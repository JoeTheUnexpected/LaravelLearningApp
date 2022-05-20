<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarEngine>
 */
class CarEngineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                '1.6L / 100hp / Petrol',
                '1.8L / 140hp / Petrol',
                '2.0L / 250hp / Petrol',
                '5.0L / 700hp / Petrol',
                '6.0L / 1000hp / Petrol',
                '1.6L / 180hp / Diesel',
                '2.0L / 350hp / Diesel',
                '3.6L / 600hp / Diesel',
            ])
        ];
    }
}
