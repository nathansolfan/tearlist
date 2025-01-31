<form action=" {{ $action }} " method="POST" class="space-y-6">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif

    {{-- title --}}
    <div>
        <label for="title">title</label>
        <input type="text" name="title" id="title" value=" {{ old('title', $task->tite ?? '') }} " class=""
            required>
    </div>

    {{-- description --}}
    <div>
        <label for="">description</label>
        <textarea name="description" id="description" rows="4" required>
    {{ old('description', $task->description ?? '') }} </textarea>
    </div>

    {{-- tier --}}
    <div>
        <label for="tier">tier</label>
        <select name="tier" id="tier" required>
            <option value="s" {{(isset($task) && $task->tier == 's') ? 'selected' : '' }} >S</option>
            <option value="a" {{(isset($task) && $task->tier == 'a') ? 'selected' : '' }} >A</option>
            <option value="b" {{(isset($task) && $task->tier == 'b') ? 'selected' : '' }} >B</option>
            <option value="c" {{(isset($task) && $task->tier == 'c') ? 'selected' : '' }} >C</option>
            <option value="d" {{(isset($task) && $task->tier == 'd') ? 'selected' : '' }} >D</option>
            <option value="e" {{(isset($task) && $task->tier == 'e') ? 'selected' : '' }} >E</option>
        </select>
    </div>

    {{-- deadline --}}
    <div>
        <label for="">deadline</label>
        <input type="date" name="deadline" id="deadline"
        value=" {{ old('deadline', $task->deadline ?? '') }}"
        class=""
        required>
    </div>

    {{-- submit --}}
    <div>
        <button type="submit"> {{$buttonText}} </button>
    </div>

</form>
