<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ToDoController;


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('todo', ToDoController::class)->except(['index', 'show']);