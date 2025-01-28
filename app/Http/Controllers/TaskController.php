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
        // $tiers = ['s','a','b','c','d','e'];
        // return view('tasks.register', compact('tiers'));
        return view('tasks.form');
    }

    public function store(Request $request)
    {
        // validate
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'tier' => 'required|in:s,a,b,c,d,e',
            'deadline' => '',
        ]);

        // create
        Task::create($validated);

        return redirect('/')->with('success', 'Task created successfully!');
    }
}
