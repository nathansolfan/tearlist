<x-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold text-center mb-6 text-gray-800">Create New Task</h1>

        @include('components.task-form', ['action' => route('tasks.store'), 'isEdit' => false, 'buttonText' => 'Create Task'])
    </div>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold text-center mb-6 text-gray-800">Create New Task</h1>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Task Form --}}
        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" name="title" id="title"
                       class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="Enter task title" required>
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                          placeholder="Enter task description" required></textarea>
            </div>

            {{-- Tier --}}
            <div>
                <label for="tier" class="block text-sm font-medium text-gray-700 mb-1">Tier</label>
                <select name="tier" id="tier"
                        class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                    <option value="s">S</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                    <option value="d">D</option>
                    <option value="e">E</option>
                </select>
            </div>

            {{-- Deadline --}}
            <div>
                <label for="deadline" class="block text-sm font-medium text-gray-700 mb-1">Deadline</label>
                <input type="date" name="deadline" id="deadline"
                       class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                       required>
            </div>

            {{-- Submit --}}
            <div class="text-center">
                <button type="submit"
                        class="px-6 py-2 bg-indigo-600 text-white font-medium rounded-lg shadow hover:bg-indigo-700 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all">
                    Create Task
                </button>
            </div>
        </form>
    </div>
</x-layout>
