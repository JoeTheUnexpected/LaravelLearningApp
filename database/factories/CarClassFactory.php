<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarClass>
 */
class CarClassFactory extends Factory
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
                'Microcar',
                'City car',
                'Subcompact',
                'Compact',
                'Mid-size',
                'Full-size',
                'Full-size luxury'
            ])
        ];
    }
}
