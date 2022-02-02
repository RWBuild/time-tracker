@extends('layouts.main')

@section('content')
    <div class="flex justify-center items-center w-11/12 mx-auto">
        @component('components.card')
            @slot('content')
                <h1 class="text-2xl border mb-5">Client information</h1>
                <p>Name: {{ $client->name }}</p>
                <p>Code: {{ $client->code }}</p>

                <p>{{ $client->phone }}</p>
                <p>{{ $client->address }}</p>
            @endslot
        @endcomponent
    </div>

    <div class="flex justify-center items-center w-11/12 mx-auto">
        @component('components.card')
            @slot('content')
                <h1 class="text-2xl border mb-5">Client projects</h1>
                @foreach ($client->projects as $item)
                    <h3>{{ $item->name }}</h3>
                    @if (Auth::User()->isAdmin() || Auth::User()->isOwner())
                        <a class="text-blue-600 mr-2" href="/projects/{{ $item->id }}/edit">Edit</a>
                        <a class="text-blue-600" href="/projects/{{ $item->id }}">View</a>
                    @endif
                @endforeach
            @endslot
        @endcomponent
    </div>
@endsection
