<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class EndReasonFactory extends Factory
{
    
    public function definition(): array
    {
       return [
                'description' => fake()->randomElement([
                    'Fin de obra',
                    'Obra suspendida',
                    'Retraso en la obra',
                ]),
        ];
    }
}
