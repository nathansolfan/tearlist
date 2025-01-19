<div x-data="{}" class="space-y-4">
    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger p-4 bg-red-100 text-red-800 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @php
        $tiers = [
            'S' => 'bg-red-500',
            'A' => 'bg-blue-500',
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
                @forelse ($tasks->filter(fn($task) => $task->tier === strtolower($tier)) as $task)
                    <!-- Task Progress Animation -->
                    <div
                        x-data="{ hover: false }"
                        x-on:mouseover="hover = true"
                        x-on:mouseleave="hover = false"
                        x-bind:class="{ 'bg-green-500': hover }"
                        class="absolute top-1/2 transform -translate-y-1/2 w-10 h-10 bg-blue-500 text-white flex items-center justify-center rounded-full shadow-md cursor-pointer transition-all"
                        style="left: {{ $progress[$task->id] ?? 0 }}%;"
                    >
                        📝
                    </div>

                    <!-- Add a Toggle Button -->
                    <button
                        x-data="{}"
                        x-on:click="$wire.toggleCompletion({{ $task->id }})"
                        class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition-all"
                    >
                        Toggle
                    </button>
                @empty
                    <p class="text-gray-500 text-sm">No tasks available for this tier.</p>
                @endforelse
            </div>

        </div>
    @endforeach
</div>
