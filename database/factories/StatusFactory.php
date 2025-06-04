<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Status>
 */
class StatusFactory extends Factory
{

    public function definition(): array
    {
        $statuses = ['libre', 'asignada'];

        return [
            'status' => $this->faker->unique()->randomElement($statuses),
        ];
    }
}
