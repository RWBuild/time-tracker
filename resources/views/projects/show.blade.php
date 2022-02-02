@extends('layouts.main')
@section('page-title') Project : {{ $project->name }}@endsection

@section('content')
@include('includes.main-nav')
  <div class="wrapper">
      <div class="card">
          <div class="mb-4 flex justify-between flex-row-reverse">
            <div>
                @if (Auth::user()->isAdmin() || Auth::user()->isOwner())
                <a href="{{ route('projects.edit',$project) }}" class="btn btn-sm">Edit</a>
                @endif
              </div>
              <div>
                <h4 class="text-lg font-semibold py-2" >Client : <span class="text-primary font-bold">{{ $project->client->name }}</span></h4>
                <h4 class="text-lg font-semibold py-2" >Project : <span class="text-primary font-bold">{{ $project->name }}</span></h4>
                <h4 class="text-lg font-semibold py-2" >Budget : <span class="text-primary font-bold">${{ number_format($project->budget) }}</span></h4>
                <h4 class="text-lg font-semibold py-2" >Description : <span class="font-normal">{{ $project->description }}</span></h4>
                <h4 class="text-lg font-semibold py-2" >Time Entries: </h4>
              </div>
          </div>
          <table class="min-w-full">
              <thead>
                  <tr>
                    <th>Date</th>
                    <th>Person</th>
                    <th>Task</th>
                    <th>Duration</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      @forelse ($project->timeEntries as $timeEntry)
                          <tr>
                             <td>{{ date('d-m-Y', strtotime($timeEntry->date)) }}</td>
                             <td>{{ $timeEntry->user->name }}</td>
                             <td>
                               {{ $timeEntry->task->name }}
                             </td>
                             <td>{{ intdiv($timeEntry->duration, 60) . ':' . ($timeEntry->duration % 60) }}</td>
                          </tr>
                      @empty
                          <p>No time entries</p>
                      @endforelse
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
@endsection


