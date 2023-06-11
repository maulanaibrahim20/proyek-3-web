<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Web\Doctor;
use App\Models\Web\Hospital;
use App\Models\Web\News;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $data = [
            "jumlah_user" => User::count(),
            "jumlah_doctor" => Doctor::count(),
            "jumlah_news" => News::count(),
            "jumlah_hospital" => Hospital::count(),
        ];

        return view('dashboard', $data);
    }
}
