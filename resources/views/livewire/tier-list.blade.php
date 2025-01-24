<x-layout>

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
                @forelse ($tasks->where('tier', strtolower($tier)) as $task)
                <!-- Task Progress Animation -->
                    <div class="relative flex items-center space-x-4 mb-4">
                        <!-- Progress Bar -->
                        <div class="relative flex-1 bg-gray-200 h-4 rounded overflow-hidden shadow-md">
                            <div
                                class="absolute h-full rounded transition-all duration-700 ease-in-out shadow-lg"
                                x-bind:style="'width: {{ $progress[$task->id] ?? 0 }}%; background: linear-gradient(90deg, #ff4d4d, #ffc107, #4caf50);'"
                                x-bind:class="{ 'animate-pulse': {{ $progress[$task->id] ?? 0 }} < 100 }"
                            ></div>
                        </div>
                        <!-- Progress Percentage -->
                        <div class="text-sm font-bold text-gray-700">
                            {{ round($progress[$task->id] ?? 0, 2) }}%
                        </div>
                    </div>

                    <!-- Add a Toggle Button -->
                    <button
                        x-data="{}"
                        x-on:click="$wire.toggleCompletion({{ $task->id }})"
                        class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition-all duration-300"
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
</x-layout>
