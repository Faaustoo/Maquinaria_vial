<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(2)->create();

        User::create([
        'name' => 'Fausto Parada',
        'email' => 'fausto@example.com', 
        'password' => Hash::make('fausto123'),
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
        'role_id' => 2,
    ]);
    }
}
