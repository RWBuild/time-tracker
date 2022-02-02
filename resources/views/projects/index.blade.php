@extends('layouts.main')
@section('page-title') Projects @endsection
@section('content')
@include('includes.main-nav')
  <div class="wrapper">
    <div class="mb-2">
      <h3 class="text-2xl font-bold text-primary">Projects</h3>
      <p>list of projects per clients</p>
    </div>
    <div class="card">
      @if (session('success'))
          <div class="alert bg-green-500">
            {{ session('success') }}
          </div>
      @endif
      @if (Auth::user()->isAdmin() || Auth::user()->isOwner())
      <div class="py-4">
        <a href="{{ route('projects.create') }}" class="btn btn-sm">
          <div class="flex items-center">
            <i class="ri-add-line text-2xl"></i> <span>Add Project</span>
          </div>
        </a>
      </div>
      @endif
      @forelse ($clients as $client)
          <div class="mb-8  border-b-2 border-primary border-opacity-5">
            <div class="py-1">
              <div class="mb-1">
                <h4 class="text-2xl  font-bold text-primary">{{ $client->name }}</h4>
              </div>
              <table class="min-w-full">
                <thead>
                  <tr>
                      <td>#</td>
                      <td>Project Name</td>
                      <td>Action</td>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $i = 1;
                  @endphp
                  @forelse ($client->projects as $project)
                      <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $project->name }}</td>
                          <td>
                            @if (Auth::user()->isAdmin() || Auth::user()->isOwner())
                            <a href="{{ route('projects.edit',$project) }}" class="btn btn-sm">Edit</a>
                            @endif
                            <a href="{{ route('projects.show',$project) }}" class="btn btn-sm">View</a>
                          </td>
                      </tr>
                  @empty
                      <p>No Project On This Client</p>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
      @empty
          <p>No Projects</p>
      @endforelse
    </div>     
  </div>
@endsection


  
