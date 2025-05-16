<?php

namespace Database\Factories;

use App\Models\EndReason;
use App\Models\Machine;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start_date' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'end_date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'kilometers' => fake()->numberBetween(100, 10000),
            'machine_id'=>Machine::inRandomOrder()->first()->id,
            'project_id'=>Project::inRandomOrder()->first()->id,
            'user_id'=>User::inRandomOrder()->first()->id,
            'reason_id'=>EndReason::inRandomOrder()->first()->id,
        ];
    }
}
