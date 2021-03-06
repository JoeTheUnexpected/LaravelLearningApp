<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarBody>
 */
class CarBodyFactory extends Factory
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
                'Cabriolet',
                'Coupe',
                'Hatchback',
                'Liftback',
                'Limousine',
                'Minivan',
                'Pickup',
                'Roadster',
                'Sedan',
                'Wagon'
            ])
        ];
    }
}
