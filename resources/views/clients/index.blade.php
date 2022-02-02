@extends('layouts.main')

@section('page-title') Clients | Time Tracker @endsection

@section('content')
@include('includes.main-nav')
<div class="wrapper">
  <div class="mb-2">
    <h3 class="text-2xl font-bold text-primary">Clients</h3>
    <p>list of clients</p>
   </div>
  <div class="card">
    @if (session('success'))
        <div class="alert bg-green-500">
            {{ session('success') }}
        </div>
    @endif
    <table class="min-w-full divide-y divide-primary">
        <thead>
          <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Phone</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @forelse ($clients as $client)
            <tr>
              <td>{{ $client->name }}</td>
            <td>{{ $client->code }}</td>
            <td>{{ $client->phone }}</td>
            <td>
              @if (Auth::user()->isAdmin() || Auth::user()->isOwner())
              <a href="{{ route('clients.edit',$client) }}" class="btn btn-sm">Edit</a>
              @endif
              <a href="{{ route('clients.show',$client) }}" class="btn btn-sm">View</a>
            </td>
            </tr>
        @empty
            <p>No clients in the database.</p>
        @endforelse
        </tbody>
    </table>
    
    @if (Auth::user()->isAdmin() || Auth::user()->isOwner())
    <div class="py-4">
      <a href="{{ route('clients.create') }}" class="btn btn-sm">
        <div class="flex items-center">
          <i class="ri-add-line text-2xl"></i> <span>Add Client</span>
        </div>
      </a>
    </div>
    @endif

  </div>
</div>
    
@endsection



