<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\EndReason;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            MachineTypeSeeder::class,
            MachineSeeder::class,  
            ProvinceSeeder::class,
            ProjectSeeder::class,
            MaintenanceSeeder::class,
            EndReasonSeeder::class,
            AssignmentSeeder::class,
        ]);
    }
}
