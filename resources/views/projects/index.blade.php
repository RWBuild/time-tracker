@extends('layouts.main')
@section('content')

  @forelse ($projects as $project)
      <p>{{ $project->name }} {{ $project->budget }}</p>

  @empty
      <p>No projects in the database.</p>
  @endforelse
  <a href="projects/create">Create Project</a>

@endsection
  
