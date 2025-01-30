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

    </div>
</x-layout>
