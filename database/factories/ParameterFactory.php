<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ParameterFactory extends Factory
{
    public function definition(): array
    {
        return [
            'value' => $this->faker->numberBetween(100, 10000)];
    }
}
