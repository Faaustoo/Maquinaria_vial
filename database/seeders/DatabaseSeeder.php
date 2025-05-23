<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            MachineTypeSeeder::class,  
            ProvinceSeeder::class,
            EndReasonSeeder::class,
            ProjectSeeder::class,
            MachineSeeder::class,
            MaintenanceSeeder::class,
            AssignmentSeeder::class,
        ]);
    }
}
