<?php

// use App\Http\Controllers\TaskController;

use App\Http\Livewire\TierList;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route for the TierList component
Route::get('/', TierList::class);
