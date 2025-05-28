<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MachineType;
use App\Models\Project;


class MachineFactory extends Factory
{

    public function definition(): array
    {
        return [
            'serial_number' => 'ABC-' . rand(1000, 9999), 
            'model' => 'Modelo-' . $this->faker->numberBetween(100, 999),
            'kilometers' => fake()->numberBetween(1, 5000),
            'type_id' => MachineType::inRandomOrder()->first()->id,  
        ];
    }
}
