<form
action=" {{ $action}} "
method="POST"
class="space-y-6">
@csrf
@if ($isEdit) @method('PUT') @endif

{{-- title --}}
<div>
    <label for=""></label>
    <input type="text" name="" id=""
    value=" {{old('title', $task->tite ?? '')}} "
    class=""
    required>
</div>

</form>
