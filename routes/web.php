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

// Task creation form (GET)
Route::get('/task/create', [TaskController::class, 'create'])->name('tasks.create');
// Task submission (POST)
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
