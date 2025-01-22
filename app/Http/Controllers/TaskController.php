<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('welcome', compact('tasks'));
    }

    public function create()
    {
        $tiers = ['s','a','b','c','d','e'];
        return view('tasks.register', compact('tiers'));
    }

    public function store(Request $request)
    {
        // validate
        $validated = $request->validate([

        ]);

    }
}
