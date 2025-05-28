<?php

namespace Database\Factories;

use App\Models\EndReason;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProjectFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'start_date' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'end_date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'province_id' => Province::inRandomOrder()->first()->id,
            'reason_id'=>EndReason::inRandomOrder()->first()->id,
        ];
    }
}
