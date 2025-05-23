<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MachineType;
use App\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Machine>
 */
class MachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'serial_number' => 'EXC-' . rand(1000, 9999), 
            'model' => 'Modelo-' . $this->faker->numberBetween(100, 999),
            'kilometers' => fake()->numberBetween(100, 10000),
            'type_id' => MachineType::inRandomOrder()->first()->id,  
        ];
    }
}
