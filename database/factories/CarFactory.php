<?php

namespace Database\Factories;

use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'body' => $this->faker->sentences(10, true),
            'price' => $this->faker->numberBetween(1000000, 5000000),
            'old_price' => $this->faker->optional()->numberBetween(5000000, 10000000),
            'salon' => $this->faker->sentences(3, true),
            'kpp' => $this->faker->randomElement(['MT', 'AT', 'CVT']),
            'year' => $this->faker->numberBetween(2000, 2022),
            'color' => $this->faker->colorName(),
            'is_new' => $this->faker->boolean(),
            'car_body_id' => CarBody::factory(),
            'car_class_id' => CarClass::factory(),
            'car_engine_id' => CarEngine::factory(),
        ];
    }
}
