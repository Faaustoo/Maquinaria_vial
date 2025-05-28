<?php

namespace Database\Factories;

use App\Models\EndReason;
use App\Models\Machine;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignmentFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'start_date' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'end_date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'kilometers' => fake()->numberBetween(1, 100),
            'machine_id'=>Machine::inRandomOrder()->first()->id,
            'project_id'=>Project::inRandomOrder()->first()->id,
            'user_id'=>User::inRandomOrder()->first()->id,
        ];
    }
}
