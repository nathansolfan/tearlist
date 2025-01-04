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
            <!-- Tiers Loop -->
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
                    <div class="relative flex-1 bg-white p-4 min-h-[100px]" id="{{ strtolower($tier) }}-tier" x-data="tierList()" @dragover.prevent @drop="dropTask('{{ strtolower($tier) }}-tier')">
                        <!-- Task Icon -->
                        <div
                            class="absolute left-0 top-1/2 transform -translate-y-1/2 w-10 h-10 bg-blue-500 text-white flex items-center justify-center rounded-full shadow-md transition-all"
                            :style="{ left: progress + '%' }"
                            @mouseover="pauseProgress"
                            @mouseleave="resumeProgress"
                        >
                            ⏳
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
                progress: 0,
                interval: null,

                init() {
                    this.startProgress();
                },

                startProgress() {
                    this.interval = setInterval(() => {
                        if (this.progress < 100) {
                            this.progress += 0.1;
                        } else {
                            clearInterval(this.interval);
                        }
                    }, 100);
                },

                pauseProgress() {
                    clearInterval(this.interval);
                },

                resumeProgress() {
                    this.startProgress();
                }
            };
        }
    </script>
</body>
</html>
