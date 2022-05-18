<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->unique()->regexify('[A-Za-z0-9_-]{10}'),
            'title' => $this->faker->unique()->sentence(),
            'description' => $this->faker->sentences(3, true),
            'body' => $this->faker->sentences(5, true),
            'published_at' => $this->faker->optional()->dateTimeBetween('first day of this month'),
        ];
    }
}
