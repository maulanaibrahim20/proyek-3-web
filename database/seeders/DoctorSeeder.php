<?php

namespace Database\Seeders;

use App\Models\Web\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::create([
            "name" => "Nairobi Putri Hayza",
            "poli" => "Dokter Gigi",
            "lulusan" => "Universitas Indonesia, 2020",
            "no_str" => "0000116622081996",
            "jenis_kelamin" => "Perempuan",
        ]);
    }
}
