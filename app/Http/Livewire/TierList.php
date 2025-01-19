<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class TierList extends Component
{
    public $tasks;
    public $progress = [];

    public function mount()
    {
        // Fetch all tasks from the database
        $this->tasks = Task::all();

        // Calculate progress for each task
        foreach ($this->tasks as $task) {
            $this->progress[$task->id] = $this->calculateProgress($task->created_at, $task->deadline);
        }
    }

    public function calculateProgress($created_at, $deadline)
{
    $totalTime = strtotime($deadline) - strtotime($created_at);
    $elapsedTime = time() - strtotime($created_at);

    // Avoid division by zero and clamp the value between 0 and 100
    if ($totalTime <= 0) {
        return 0;
    }

    return min(max(($elapsedTime / $totalTime) * 100, 0), 100);
}


public function toggleCompletion($taskId)
{
    $task = Task::findOrFail($taskId);
    $task->completed = !$task->completed;
    $task->save();

    logger()->info('Task ID ' . $taskId . ' toggled to ' . ($task->completed ? 'completed' : 'not completed'));

    // Refresh the tasks list
    $this->tasks = Task::all();
}


    public function render()
    {
        return view('livewire.tier-list')
            ->extends('layouts.app') // Extend the layout
            ->section('content');    // Specify the section
    }
}
