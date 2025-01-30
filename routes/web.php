<?php

// use App\Http\Controllers\TaskController;

use App\Http\Controllers\TaskController;
use App\Http\Livewire\TierList;
use Illuminate\Support\Facades\Route;

// Route for the homepage (Tier List App)
Route::get('/', function () {
    return view('welcome'); // Ensure this loads the Livewire component
});
// // Route for the TierList component
// Route::get('/', TierList::class);

// Task creation form (GET)
Route::get('/task/create', [TaskController::class, 'create'])->name('tasks.create');
// Task submission (POST)
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
// Index
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
// Edit/Update
Route::get('/tasks/{task}/edit', [TaskController::class,'edit'])->name('tasks.edit');
// Update
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

// Destroy
Route::delete('tasks/{task}', [TaskController::class,'destroy'])->name('tasks.destroy');
