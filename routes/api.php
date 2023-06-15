<?php

use App\Http\Controllers\API\DoctorController;
use App\Http\Controllers\API\HospitalController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\SpesialisController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/auth", [LoginController::class, "login"]);

Route::resource("/user", UserController::class);
Route::resource("/doctor", DoctorController::class);
Route::resource("/hospital", HospitalController::class);
Route::resource("/news", NewsController::class);
Route::resource("/spesialis", SpesialisController::class);

//start Routing Message
Route::get('/messages', [MessageController::class, 'index']);

// Mengambil detail pesan
Route::get('/messages/{id}', [MessageController::class, 'show']);

// Menyimpan pesan baru
Route::post('/messages', [MessageController::class, 'store']);

// Mengupdate pesan
Route::put('/messages/{id}', [MessageController::class, 'update']);

// Menghapus pesan
Route::delete('/messages/{id}', [MessageController::class, 'destroy']);
// Route::resource("/message", MessageController::class);

//end Routing Messages

Route::get("/counting", [HospitalController::class, "counting"]);
Route::get("/alldoctor", [DoctorController::class, "alldoctor"]);
Route::get("/allnews", [NewsController::class, "allnews"]);
