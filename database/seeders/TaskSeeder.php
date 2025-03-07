<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Task::create([
        //     'title' => 'Finish Project',
        //     'description' => 'This is my project description',
        //     'tier' => 's',
        //     'deadline' => '2025-01-14',
        //     'created_at' => now()->subDays(10),
        // ]);

        // Task::create([
        //     'title' => 'Read a Book',
        //     'description' => 'This is my book description',
        //     'tier' => 'a',
        //     'deadline' => '2025-01-20',
        //     'created_at' => now()->subDays(5),
        // ]);

        // Task::create([
        //     'title' => 'Go to Gym',
        //     'description' => 'This is gym description',
        //     'tier' => 'b',
        //     'deadline' => '2025-01-25',
        //     'created_at' => now(),
        // ]);

        Task::create([
            'title' => 'Finish Project',
            'description' => 'This is my project description',
            'tier' => 's',
            'deadline' => now()->addDays(10), // 10 days from now
            'created_at' => now()->subDays(5), // Created 5 days ago
        ]);

        Task::create([
            'title' => 'Prepare Presentation',
            'description' => 'Presentation details here.',
            'tier' => 'b',
            'deadline' => now()->addDays(15), // Deadline in 15 days
            'created_at' => now()->subDays(5), // Created 5 days ago
        ]);
    }


}
