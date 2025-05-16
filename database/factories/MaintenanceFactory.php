<?php

namespace Database\Factories;

use App\Models\Machine;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maintenance>
 */
class MaintenanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => now(),
            'kilometers' => fake()->numberBetween(100, 10000),
            'description' => fake()->sentence(),
            'user_id'=> User::inRandomOrder()->first()->id,
            'machine_id'=>Machine::inRandomOrder()->first()->id,
        ];
    }
}
