<?php

namespace Database\Seeders;

use App\Models\Web\Hospital;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hospital::create([
            "name" => "Rumah Sakit Citra Bunga Merdeka",
            "address" => "Jln. Surya Sejahtera 20",
            "image" => "pic1.png"
        ]);
        Hospital::create([
            "name" => "Rumah Sakit Anak Happy Family & Kids",
            "address" => "Jln. Surya Sejahtera 20",
            "image" => "pic2.png"

        ]);
        Hospital::create([
            "name" => "Rumah Sakit Jiwa Tingkatan Paling Atas",
            "address" => "Jln. Surya Sejahtera 20",
            "image" => "pic3.png"

        ]);
    }
}
