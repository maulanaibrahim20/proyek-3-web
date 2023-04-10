<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/index', function () {
    return view('index');
})->name('login')->middleware('auth');
Route::get('/', [LoginController::class,'index']
)->middleware('guest');
Route::post('/', [LoginController::class,'login']);
Route::resource('/index/table/user', UserController::class, [
    'as' => 'web'
])->middleware('auth');

Route::get("/logout", [LoginController::class, "logout"]);
