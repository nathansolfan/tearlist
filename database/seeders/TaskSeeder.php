<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create(['title' => 'Finish Project', 'description' => 'This is my project description', 'tier' => 'S', 'deadline' => '2025-01-07']);
        Task::create(['title' => 'Read a Book', 'description' => 'This is my book description', 'tier' => 'A', 'deadline' => '2025-01-07']);
        Task::create(['title' => 'Go to Gym', 'description' => 'This is gym description', 'tier' => 'B', 'deadline' => '2025-01-07']);


    }
}
