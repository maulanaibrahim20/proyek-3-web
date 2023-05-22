<?php

namespace Database\Seeders;

use App\Models\Web\Spesialis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpesialisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Spesialis::create([
            "spesialis" => "Dokter Gigi",
        ]);
        Spesialis::create([
            "spesialis" => "Dokter Anak",
        ]);
        Spesialis::create([
            "spesialis" => "Dokter Psikolog",
        ]);
        Spesialis::create([
            "spesialis" => "Dokter Psikiater",
        ]);
    }
}
