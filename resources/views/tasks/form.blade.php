<x-layout>
    <h1>Create New Task</h1>
    {{-- error message --}}
    @if (session('success'))
    <div>
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error )
            <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>

    @endif

    <form
    action="{{ route(tasks.store) }}"
    method="POST"
    class="">

    @csrf

    {{-- title --}}
    {{-- <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="">
    </div> --}}

    {{-- description --}}
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="4"></textarea>
    </div>

    {{-- tier --}}
    <label for="tier">Tier</label>
    <select name="tier" id="tier">
        <option value="s">S</option>
        <option value="a">A</option>
        <option value="b">B</option>
        <option value="c">C</option>
        <option value="d">D</option>
        <option value="e">E</option>
    </select>

    {{-- deadlijne --}}
    <div>
        <label for="deadline">Deadline</label>
        <input type="date" name="deadline" id="deadline">
    </div>

    {{-- submit --}}
    <div>
        <button type="submit">Create Task</button>
    </div>



    </form>
</x-layout>
