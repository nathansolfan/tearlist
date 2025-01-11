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
        // Load tasks from the database
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

        // Return progress percentage, capped at 100%
        return min(($elapsedTime / $totalTime) * 100, 100);
    }

    public function render()
    {
        // Pass tasks and progress data to the Blade view
        return view('livewire.tier-list', [
            'tasks' => $this->tasks,
            'progress' => $this->progress,
        ]);
    }
}
