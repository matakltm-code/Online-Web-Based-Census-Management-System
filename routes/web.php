<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChangepasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Profile route
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile/edit', [ProfileController::class, 'edit']);
Route::patch('/profile/{profile}', [ProfileController::class, 'update']);
Route::get('/profile/change-password', [ChangepasswordController::class, 'index']);
Route::post('/profile/change-password', [ChangepasswordController::class, 'store']);




// admin


// supervisor


// enumerator


// resident
