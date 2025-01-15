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
        $this->tasks = Task::all();

        foreach ($this->tasks as $task) {
            $this->progress[$task->id] = $this->calculateProgress($task->created_at, $task->deadline);
        }
    }

    public function calculateProgress($created_at, $deadline)
    {
        $totalTime = strtotime($deadline) - strtotime($created_at);
        $elapsedTime = time() - strtotime($created_at);

        return min(($elapsedTime / $totalTime) * 100, 100);
    }

    /** @noinspection PhpUndefinedMethodInspection */
    public function render()
    {
        return view('livewire.tier-list')
            ->extends('layouts.app') // Extend the correct layout
            ->section('content');    // Specify the section to render
    }
}
