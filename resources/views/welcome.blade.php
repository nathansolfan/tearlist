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
    <div class="container mx-auto px-4 py-10">
        <h1 class="text-4xl font-bold text-center mb-8">🎯 Tier List To-Do App</h1>

        <!-- Tier List Container -->
        <div class="space-y-4">
            <!-- Tier Box Template -->
            @php
                $tiers = ['S' => 'bg-red-500', 'A' => 'bg-orange-500', 'B' => 'bg-yellow-500', 'C' => 'bg-green-500', 'D' => 'bg-blue-500', 'E' => 'bg-gray-500'];
            @endphp

            @foreach ($tiers as $tier => $color)
                <div class="flex items-center border rounded-lg overflow-hidden shadow-lg">
                    <div class="{{ $color }} text-white text-center font-extrabold w-20 h-20 flex items-center justify-center text-2xl rounded-l-md shadow-lg border border-black/10 hover:shadow-xl hover:bg-opacity-90 transition duration-200">
                        {{ $tier }}
                    </div>

                    <div class="flex-1 bg-white p-4 min-h-[100px]" id="{{ strtolower($tier) }}-tier" x-data="tierList()" @dragover.prevent @drop="dropTask('{{ strtolower($tier) }}-tier')">
                        <!-- Sample Task -->
                        <div class="bg-yellow-200 p-3 rounded-md shadow-md border border-gray-300 cursor-grab hover:bg-yellow-300 hover:shadow-lg transition duration-200" draggable="true" @dragstart="dragStart($event.target)">
                            Task Example
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Alpine.js Logic -->
    <script>
        function tierList() {
            return {
                draggedTask: null,
                dragStart(task) {
                    this.draggedTask = task;
                },
                dropTask(tierId) {
                    if (this.draggedTask) {
                        document.getElementById(tierId).appendChild(this.draggedTask);
                        this.draggedTask = null;
                    }
                }
            };
        }
    </script>
</body>
</html>
