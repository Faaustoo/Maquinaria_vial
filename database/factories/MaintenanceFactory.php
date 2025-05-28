<?php

namespace Database\Factories;

use App\Models\Machine;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaintenanceFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'date' => now(),
            'kilometers' => fake()->numberBetween(100, 5000),
            'description' => fake()->sentence(),
            'type' => 'maintenance', 
            'user_id'=> User::inRandomOrder()->first()->id,
            'machine_id'=>Machine::inRandomOrder()->first()->id,
        ];
    }
}
