<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Province;

class ProvinceFactory extends Factory
{
    
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
