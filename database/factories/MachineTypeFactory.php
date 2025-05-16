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
            'Motoniveladora',
            'Rodillo',
            'Camión volcador',
            'Hormigonera',
            'Fresadora de asfalto',
            'Terminadora de asfalto',
            'Topadora',
            'Compactadora'
        ];

        return [
            'name' => $this->faker->unique()->randomElement($names),
        ];
    }
}
