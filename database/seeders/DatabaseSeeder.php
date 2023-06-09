<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Web\Hospital;
use App\Models\Web\Spesialis;
use Database\Seeders\Akun\UserSeeder;
use Database\Seeders\DoctorSeeder;
use Database\Seeders\SpesialisSeeder;
use Database\Seeders\ChatSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(HospitalSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(SpesialisSeeder::class);
        $this->call(ChatSeeder::class);
    }
}
