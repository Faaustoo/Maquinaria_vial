<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Province;

class ProvinceFactory extends Factory
{
    
    public function definition(): array
    {
        $provincias = [
            ['name' => 'Buenos Aires', 'latitude' => -36.4500, 'longitude' => -60.0667],
            ['name' => 'Catamarca', 'latitude' => -28.4696, 'longitude' => -65.7795],
            ['name' => 'Chaco', 'latitude' => -27.4515, 'longitude' => -58.9865],
            ['name' => 'Chubut', 'latitude' => -43.3000, 'longitude' => -65.1000],
            ['name' => 'Córdoba', 'latitude' => -31.4167, 'longitude' => -64.1833],
            ['name' => 'Corrientes', 'latitude' => -27.4806, 'longitude' => -58.8200],
            ['name' => 'Entre Ríos', 'latitude' => -31.7833, 'longitude' => -60.5167],
            ['name' => 'Formosa', 'latitude' => -26.1847, 'longitude' => -58.1744],
            ['name' => 'Jujuy', 'latitude' => -23.3333, 'longitude' => -65.3500],
            ['name' => 'La Pampa', 'latitude' => -36.6167, 'longitude' => -64.2833],
            ['name' => 'La Rioja', 'latitude' => -29.4117, 'longitude' => -66.8500],
            ['name' => 'Mendoza', 'latitude' => -32.8908, 'longitude' => -68.8272],
            ['name' => 'Misiones', 'latitude' => -27.3667, 'longitude' => -55.8833],
            ['name' => 'Neuquén', 'latitude' => -38.9500, 'longitude' => -68.0667],
            ['name' => 'Río Negro', 'latitude' => -40.8000, 'longitude' => -63.0000],
            ['name' => 'Salta', 'latitude' => -24.7833, 'longitude' => -65.4167],
            ['name' => 'San Juan', 'latitude' => -31.5375, 'longitude' => -68.5364],
            ['name' => 'San Luis', 'latitude' => -33.3000, 'longitude' => -66.3500],
            ['name' => 'Santa Cruz', 'latitude' => -49.3000, 'longitude' => -67.8000],
            ['name' => 'Santa Fe', 'latitude' => -31.6333, 'longitude' => -60.7000],
            ['name' => 'Santiago del Estero', 'latitude' => -27.7833, 'longitude' => -64.2667],
            ['name' => 'Tierra del Fuego', 'latitude' => -54.8000, 'longitude' => -68.3000],
            ['name' => 'Tucumán', 'latitude' => -26.8167, 'longitude' => -65.2167],
            ['name' => 'Ciudad Autónoma de Buenos Aires', 'latitude' => -34.6037, 'longitude' => -58.3816],
    ];


    $provincia = $this->faker->unique()->randomElement($provincias);

    return [
        'name' => $provincia['name'],
        'latitude' => $provincia['latitude'],
        'longitude' => $provincia['longitude'],
    ];
    }
}
