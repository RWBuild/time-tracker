@extends('layouts.main')

@section('content')

    <div class="flex justify-center items-center w-11/12 mx-auto">
        @component('components.card')
            @slot('content')
                <h1 class="text-2xl border mb-5">Project information</h1>
                <h2>Edit {{ $project->name }}</h2>
                <p>Name: {{ $project->name }}</p>
                <p>Client: {{ $project->client->name }}</p>
                <p>{{ $project->budget }}</p>
                <p>{{ $project->description }}</p>
            @endslot
        @endcomponent
    </div>
    <div class="flex justify-center items-center w-11/12 mx-auto">
        @forelse ($project->timeEntries as $entry)
            @component('components.card')
                @slot('content')
                    <p>{{ $entry->user->name }}</p>
                    <p>{{ $entry->duration }}</p>
                @endslot
            @endcomponent
        @empty
            <p>No company saved yet</p>
        @endforelse
    </div>
@endsection
