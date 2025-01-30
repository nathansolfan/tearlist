<x-layout>
    <div>
        <h1>Edit Task</h1>

        {{-- Error message --}}
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error )
                <li> {{$error}} </li>
                @endforeach
            </ul>
        </div>
        @endif
        {{-- Task Form --}}
        <form action="tasks.update" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value=" {{old('title', $task->title)}} " required>
            </div>

            {{-- description --}}
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="4" required> {{old('description', $task->description)}} </textarea>

            </div>

        </form>


    </div>
</x-layout>
