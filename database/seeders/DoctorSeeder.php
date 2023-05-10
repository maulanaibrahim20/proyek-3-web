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
            "image" => "doctor2.png",
            "name" => "Nairobi Putri Hayza",
            "poli" => "Dokter Gigi",
            "lulusan" => "Universitas Indonesia, 2020",
            "no_str" => "0000116622081996",
            "jenis_kelamin" => "Perempuan",
            "id_hospital" => "3",
        ]);
        Doctor::create([
            "image" => "doctor3.png",
            "name" => "Alexander Jannie",
            "poli" => "Dokter Anak",
            "lulusan" => "Universitas Indonesia, 2021",
            "no_str" => "0000116622081996",
            "jenis_kelamin" => "Perempuan",
            "id_hospital" => "2",
        ]);
        Doctor::create([
            "image" => "doctor1.png",
            "name" => "John McParker Steve",
            "poli" => "Dokter Bedah",
            "lulusan" => "Universitas Brawijaya, 2008",
            "no_str" => "0000116622081996",
            "jenis_kelamin" => "Laki-Laki",
            "id_hospital" => "2",
        ]);
    }
}
