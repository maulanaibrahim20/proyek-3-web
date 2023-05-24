<?php

use App\Http\Controllers\API\DoctorController;
use App\Http\Controllers\API\HospitalController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\NewsController;
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

Route::get("/counting", [HospitalController::class, "counting"]);
Route::get("/alldoctor", [DoctorController::class, "alldoctor"]);
Route::get("/allnews", [NewsController::class, "allnews"]);
