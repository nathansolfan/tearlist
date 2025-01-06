<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tier List To-Do App</title>

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Main Container -->
    <div class="container mx-auto px-4 py-10">
        <!-- Page Title -->
        <h1 class="text-4xl font-bold text-center mb-8">🎯 Tier List To-Do App</h1>

        <!-- Tier List Container -->
        <div class="space-y-4" x-data="tierList()">
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

            <!-- Display each tier dynamically -->
            @foreach ($tiers as $tier => $color)
                <div class="flex items-center border rounded-lg overflow-hidden shadow-lg">
                    <!-- Tier Label -->
                    <div class="{{ $color }} text-white text-center font-extrabold w-20 h-20 flex items-center justify-center text-2xl rounded-l-md shadow-lg border border-black/10">
                        {{ $tier }}
                    </div>

                    <!-- Task Container -->
                    <div class="relative flex-1 bg-white p-4 min-h-[100px]" id="{{ strtolower($tier) }}-tier">
                        <!-- Task Icon -->
                        <div
                            class="absolute left-0 top-1/2 transform -translate-y-1/2 w-10 h-10 bg-blue-500 text-white flex items-center justify-center rounded-full shadow-md cursor-pointer"
                            @click="showConfirmation('{{ strtolower($tier) }}')"
                        >
                            ⏳
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Alpine.js -->
    <script src="https://unpkg.com/alpinejs" defer></script>

    <!-- JavaScript Logic -->
    <script>
        function tierList() {
            return {
                // Show a confirmation window when clicking the task icon
                showConfirmation(tier) {
                    // Display a confirmation window
                    const userChoice = confirm(`You clicked on the ${tier.toUpperCase()} Tier. Do you want to add a new task? Click Cancel to view tasks.`);

                    if (userChoice) {
                        // Redirect to the task creation page
                        window.location.href = `/task/create?tier=${tier}`;
                    } else {
                        // Redirect to the task list page
                        window.location.href = `/tasks?tier=${tier}`;
                    }
                }


            };
        }
    </script>
</body>
</html>
