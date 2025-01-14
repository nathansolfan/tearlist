<?php

// use App\Http\Controllers\TaskController;

use App\Http\Livewire\TierList;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', TierList::class);


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [TaskController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// });

