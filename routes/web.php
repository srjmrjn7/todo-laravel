<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ToDoController;

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

//welcome page
Route::get('/', function () {
    return view('welcome');
})->name('home');

//login
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');

//register
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register',[AuthController::class, 'postRegister'])->name('register.post');

//logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

//dashboard
Route::group(['middleware' => 'auth'], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('todo', ToDoController::class)->only(['create', 'edit', 'destroy']);
});


