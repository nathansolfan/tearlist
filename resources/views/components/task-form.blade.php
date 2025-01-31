<form
action=" {{ $action}} "
method="POST"
class="space-y-6">
@csrf
@if ($isEdit) @method('PUT') @endif

</form>
