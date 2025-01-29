<x-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold text-center mb-6 text-gray-800">Task List</h1>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Add New Task Button --}}
        <div class="mb-4 text-right">
            <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                + Add New Task
            </a>
        </div>

        {{-- Tasks Table --}}
        <table class="w-full border-collapse border border-gray-300 shadow-md">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Description</th>
                    <th class="border px-4 py-2">Tier</th>
                    <th class="border px-4 py-2">Deadline</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td class="border px-4 py-2">{{ $task->title }}</td>
                    <td class="border px-4 py-2">{{ $task->description }}</td>
                    <td class="border px-4 py-2 font-bold uppercase">{{ $task->tier }}</td>
                    <td class="border px-4 py-2">{{ $task->deadline }}</td>
                    <td class="border px-4 py-2">
                        @if ($task->completed)
                            <span class="text-green-600 font-bold">Completed</span>
                        @else
                            <span class="text-red-500 font-bold">Pending</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2">
                        {{-- Edit Task --}}
                        <a href="{{ route('tasks.edit', $task->id) }}" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Edit
                        </a>

                        {{-- Delete Task --}}
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
