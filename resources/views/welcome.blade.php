<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tier List To-Do App</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto px-4 py-10">
        <h1 class="text-4xl font-bold text-center mb-8">🎯 Tier List To-Do App</h1>

        <!-- Tier List Container -->
        <div class="space-y-6">
            <!-- S Tier -->
            <div class="bg-yellow-300 p-4 rounded shadow">
                <h2 class="text-xl font-bold text-center">S Tier</h2>
                <div class="space-y-2" id="s-tier" x-data="tierList()" @dragover.prevent @drop="dropTask('s-tier')">
                    <div class="bg-white p-2 rounded shadow" draggable="true" @dragstart="dragStart($event.target)">Task 1</div>
                </div>
            </div>

            <!-- A Tier -->
            <div class="bg-red-300 p-4 rounded shadow">
                <h2 class="text-xl font-bold text-center">A Tier</h2>
                <div class="space-y-2" id="a-tier" x-data="tierList()" @dragover.prevent @drop="dropTask('a-tier')">
                    <div class="bg-white p-2 rounded shadow" draggable="true" @dragstart="dragStart($event.target)">Task 2</div>
                </div>
            </div>

            <!-- B Tier -->
            <div class="bg-orange-300 p-4 rounded shadow">
                <h2 class="text-xl font-bold text-center">B Tier</h2>
                <div class="space-y-2" id="b-tier" x-data="tierList()" @dragover.prevent @drop="dropTask('b-tier')"></div>
            </div>

            <!-- C Tier -->
            <div class="bg-green-300 p-4 rounded shadow">
                <h2 class="text-xl font-bold text-center">C Tier</h2>
                <div class="space-y-2" id="c-tier" x-data="tierList()" @dragover.prevent @drop="dropTask('c-tier')"></div>
            </div>

            <!-- D Tier -->
            <div class="bg-blue-300 p-4 rounded shadow">
                <h2 class="text-xl font-bold text-center">D Tier</h2>
                <div class="space-y-2" id="d-tier" x-data="tierList()" @dragover.prevent @drop="dropTask('d-tier')"></div>
            </div>
        </div>
    </div>

    <!-- Add Alpine.js for interactivity -->
    <script src="https://unpkg.com/alpinejs@3.x.x" defer></script>

    <!-- Drag-and-Drop Logic -->
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
