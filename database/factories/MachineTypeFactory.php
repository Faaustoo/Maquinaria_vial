<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MachineTypeFactory extends Factory
{
    public function definition(): array
    {
        $names = [
            'Excavadora',
            'Retroexcavadora',
            'Camión volcador',
            'Hormigonera',
            'Compactadora'
        ];

        return [
            'name' => $this->faker->unique()->randomElement($names),
        ];
    }
}
