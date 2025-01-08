<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tier List To-Do App</title>

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Main Container -->
    <div class="container mx-auto px-4 py-10">
        <!-- Page Title -->
        <h1 class="text-4xl font-bold text-center mb-8">🎯 Tier List To-Do App</h1>

        <!-- Tier List Container -->
        <div class="space-y-4" x-data="tierList({{ json_encode($tasks) }})">
            <!-- Loop through each tier (S, A, B, etc.) -->
            @php
                $tiers = [
                    'S' => 'bg-red-500',
                    'A' => 'bg-orange-500',
                    'B' => 'bg-yellow-500',
                    'C' => 'bg-green-500',
                    'D' => 'bg-blue-500',
                    'E' => 'bg-gray-500',
                ];
            @endphp

            @foreach ($tiers as $tier => $color)
                <div class="flex items-center border rounded-lg overflow-hidden shadow-lg">
                    <!-- Tier Label -->
                    <div class="{{ $color }} text-white text-center font-extrabold w-20 h-20 flex items-center justify-center text-2xl rounded-l-md shadow-lg border border-black/10">
                        {{ $tier }}
                    </div>

                    <!-- Task Container -->
                    <div class="relative flex-1 bg-white p-4 min-h-[100px]" id="{{ strtolower($tier) }}-tier">
                        @foreach ($tasks->where('tier', strtolower($tier)) as $task)
                            <!-- Task Icon -->
                            <div
                                class="absolute top-1/2 transform -translate-y-1/2 w-10 h-10 bg-blue-500 text-white flex items-center justify-center rounded-full shadow-md cursor-pointer"
                                :style="{ left: progress[{{ $task->id }}] + '%' }"
                                @click="showConfirmation('{{ $task->title }}')"
                            >
                                📝
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>

<script>
    function tierList(tasks) {
        return {
            tasks: tasks || [],
            progress: {},

            // Automatically called on component initialization
            init() {
                this.calculateProgress();
            },

            // Calculate progress based on task deadline
            calculateProgress() {
                this.tasks.forEach(task => {
                    const today = new Date();
                    const deadline = new Date(task.deadline);

                    const totalTime = deadline - new Date(task.created_at);
                    const elapsedTime = today - new Date(task.created_at);

                    const progressPercentage = Math.min((elapsedTime / totalTime) * 100, 100);
                    this.progress[task.id] = progressPercentage;
                });
            },

            // Show a confirmation popup when a task is clicked
            showConfirmation(taskTitle) {
                alert(`Task: ${taskTitle}`);
            }
        };
    }

    // Initialize Alpine.js
    document.addEventListener('alpine:init', () => {
        Alpine.data('tierList', tierList);
    });
</script>

