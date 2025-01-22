<?php

// use App\Http\Controllers\TaskController;

use App\Http\Controllers\TaskController;
use App\Http\Livewire\TierList;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route for the TierList component
Route::get('/', TierList::class);

Route::get('/register', [TaskController::class, 'register'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
