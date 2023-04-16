<?php

namespace Database\Seeders;

use App\Models\Web\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::create([
            "title" => "Is it safe to stay at home during coronavirus?",
            "description" => "WHO published a new report Access to NCD medicines: emergent issues during the COVID-19 pandemic and key structural factors.",
            "image" => "dummyNews1.png"
        ]);
        News::create([
            "title" => "Consume yellow citrus helps you healthier",
            "description" => "WHO published a new report Access to NCD medicines: emergent issues during the COVID-19 pandemic and key structural factors.",
            "image" => "dummyNews2.png"
        ]);
        News::create([
            "title" => "Learn how to make a
            proper orange juice at home",
            "description" => "WHO published a new report Access to NCD medicines: emergent issues during the COVID-19 pandemic and key structural factors.",
            "image" => "dummyNews3.png"
        ]);
    }
}
