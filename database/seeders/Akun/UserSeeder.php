<?php

namespace Database\Seeders\Akun;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "administrator",
            "email" => "admin@gmail.com",
            "profession" => "Petani",
            "password" => bcrypt("password123"),
        ]);
    }
}
