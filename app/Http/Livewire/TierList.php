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
        $this->tasks = collect(Task::all());

        // Calculate progress for each task
        foreach ($this->tasks as $task) {
            $this->progress[$task->id] = $this->calculateProgress($task->created_at, $task->deadline);
        }
    }

    public function calculateProgress($created_at, $deadline)
    {
        $totalTime = strtotime($deadline) - strtotime($created_at);
        $elapsedTime = time() - strtotime($created_at);

        logger()->info("Total Time: $totalTime, Elapsed Time: $elapsedTime");

        if ($totalTime <= 0) {
            return 0;
        }

        $progress = min(max(($elapsedTime / $totalTime) * 100, 0), 100);
        logger()->info("Progress: $progress%");

        return $progress;
    }


    public function toggleCompletion($taskId)
    {
        try {
            $task = Task::findOrFail($taskId); // Find the task by ID
            $task->completed = !$task->completed; // Toggle completion status
            $task->save(); // Save the changes

            logger()->info("Task ID {$taskId} toggled to " . ($task->completed ? 'completed' : 'not completed'));

            // Refresh tasks
            $this->tasks = Task::all();
        } catch (\Exception $e) {
            logger()->error("Error toggling task ID {$taskId}: " . $e->getMessage());

            // Set an error message to display on the page
            $this->addError('toggleError', 'Something went wrong while toggling the task status.');
        }
    }




    public function render()
    {
        // return view('livewire.tier-list')->extends('components.layouts.app');
        return view('livewire.tier-list')->layout('components.layout');
    }
}
