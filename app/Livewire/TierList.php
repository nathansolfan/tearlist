<?php

namespace App\Livewire;

use Livewire\Component;

class TierList extends Component
{

    public $tasks;

    public function mount($tasks)
    {
        $this->tasks = $tasks;
    }

    public function calculateProgress($created_at, $deadline)
    {
        $totalTime = strtotime($deadline) - strtotime($created_at) ;
        $elapsedTime = time() - strtotime($created_at);

        return min(($elapsedTime / $totalTime) * 100,100);
    }



    public function render()
    {
        return view('livewire.tier-list');
    }
}
