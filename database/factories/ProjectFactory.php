<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'start_date' => now(),
            'end_date' => fake()->dateTime(),
            'value' => fake()->randomFloat(),
            'status' => fake()->randomElement(['A', 'I']),
            'creator' => fake()->numberBetween(1, 1000)
        ];
    }
}
