<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Province;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Province>
 */
class ProvinceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $provincias = ['Entre Rios', 'Buenos Aires', 'Santa Fe', 'Cordoba', 'Mendoza', 'San Juan',
            'San Luis', 'La Pampa','Santiago del Estero', 'Catamarca', 'La Rioja', 'Tierra del Fuego', 
            'Chubut', 'Santa Cruz', 'Neuquen','Rio Negro', 'Chaco', 'Misiones', 'Corrientes', 'Salta', 
            'Jujuy', 'Formosa'];

        return [
             'name' => $this->faker->unique()->randomElement($provincias),
            ];
    }
}
