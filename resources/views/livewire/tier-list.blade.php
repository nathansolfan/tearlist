<div class="space-y-4">
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
                    @php
                        $progress = $this->calculateProgress($task->created_at, $task->deadline);
                    @endphp

                    <!-- Task Icon -->
                    <div
                        class="absolute top-1/2 transform -translate-y-1/2 w-10 h-10 bg-blue-500 text-white flex items-center justify-center rounded-full shadow-md cursor-pointer task-icon"
                        style="left: {{ $progress }}%; transition: left 0.5s ease-in-out;"
                        wire:click="$emit('showConfirmation', '{{ $task->title }}')"
                    >
                        📝
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
