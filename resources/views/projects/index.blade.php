@extends('layouts.main')
@section('content')
@if (session('success'))
@component('components.card')
    @slot('content')
        <p class="text-green-600">{{ session('success') }}</p>
    @endslot
@endcomponent
@endif

    @forelse ($clients as $client)
        <p>{{ $client->name }} </p>
        @forelse($client->projects as $project)
            <p>{{ $project->name }}</p>
            <a href="projects/create">Create Project</a>


        @empty
            <p>No projects in the database.</p>
        @endforelse
        @empty
        <p>No clients in the database.</p>

    @endforelse
    <a href="projects/create">Create Project</a>
    <a href="projects/{{{ $project->id }}}/edit">Create Project</a>



@endsection
