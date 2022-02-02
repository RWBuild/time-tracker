@extends('layouts.main')

@section('page-title') Client {{ $client->name }} @endsection

@section('content')
  @include('includes.main-nav')
  <div class="wrapper">
    <div class="card">
        
        <div class="py-2 flex items-center justify-between">
          <h3 class="text-2xl font-bold text-primary">{{ $client->name }}</h3>
        <div>
          <a href="#" class="btn btn-sm">Edit</a>
        </div>
        </div>

        <h4 class="text-lg font-semibold" >Code : {{ $client->code }}</h4>
        <h4 class="text-lg font-semibold">Address : {{ $client->address }}</h4>
        <h4 class="text-lg font-semibold">Projects: </h4>
        <div class="py-4">
          <table class="min-w-full divide-y divide-primary">
            <thead>
              <tr>
                <th>Project</th>
                <th>budget</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($client->projects as $project)
                    <tr>
                      <td>{{ $project->name }}</td>
                      <td>${{ $project->budget }}</td>
                      <td>
                        @if (Auth::user()->isAdmin() || Auth::user()->isOwner())
                        <a href="#" class="btn btn-sm">Edit</a>
                        @endif
                        <a href="#" class="btn btn-sm">View</a>
                      </td>
                    </tr>
                @empty
                    <p>No project found</p>
                @endforelse
            </tbody>
          </table>
        </div>
        @if (Auth::user()->isAdmin() || Auth::user()->isOwner())
        <div class="py-4">
          <a href="#" class="btn btn-sm">
            <div class="flex items-center">
              <i class="ri-add-line text-2xl"></i> <span>Add project</span>
            </div>
          </a>
        </div>
        @endif
    </div>
  </div>
@endsection