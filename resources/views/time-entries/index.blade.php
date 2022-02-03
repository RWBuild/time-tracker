@extends('layouts.main')

@section('content')
    <div class="mx-20">
        <div class="bg-white my-5 flex justify-between p-5 items-center">
            <div>
                <p> <i class="fa fa-user"></i>
                    {{ Auth::User()->name }}</p>
            </div>
            <form action="/time-entries/?date" method="GET">
                <div>
                    <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>">
                    <button type="submit">submit</button>
                </div>
            </form>
        </div>
        @if ($entriesByDate->isEmpty())
            @php
                $nowEntry = $timeEntries;
            @endphp
        @else
            @php
                $nowEntry = $entriesByDate;
            @endphp
        @endif

        <form action="">
            @csrf
            <select class="w-48">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
            <select class="w-48">
                @foreach ($nowEntry as $timeEntry)
                    <option value="{{ $timeEntry->project_id }}">{{ $timeEntry->project->name }}</option>
                @endforeach
            </select>
            <select class="w-48">
                @foreach ($nowEntry as $timeEntry)
                    <option value="{{ $timeEntry->task_id }}">{{ $timeEntry->task->name }}</option>
                @endforeach
            </select class="w-48">
            <input class="w-48 rounded border border-sky-500" type="text"
                value="{{ intdiv($timeEntry->duration, 60) . ':' . $timeEntry->duration % 60 }}" placeholder="duration" />

        </form>

        <div id="form"></div>

        <script>
            function appendForm() {
                const newrow = document.getElementById('form');
                const form = document.createElement('div')
                form.innerHTML = `
            <form action="">
              @csrf
              <select class="w-48">
                  @foreach ($clients as $client)
                      <option value="{{ $client->id }}">{{ $client->name }}</option>
                  @endforeach
              </select>
              <select class="w-48">
                  @foreach ($projects as $project)
                      <option value="{{ $project->id }}">{{ $project->name }}</option>
                  @endforeach
              </select>
              <select class="w-48" >
                  @foreach ($tasks as $task)
                      <option value="{{ $task->id }}">{{ $task->name }}</option>
                  @endforeach
              </select class="w-48">
              <input class="w-48 rounded border border-sky-500" type="text" placeholder="Duration" name="duration" />
              <button type="submit" class="text-blue-500">Submit</button>
            </form>
          `;
                newrow.appendChild(form)
            }
        </script>


        <button class="add_client" onclick="appendForm();">Add row</button>

        {{-- @forelse ($timeEntries as $timeEntry)
        <p>{{ $timeEntry->project->name }} {{ $timeEntry->duration }} {{ $timeEntry->date }} {{ $clients }}</p>
    @empty
        <p>No time entries for this date.</p>
    @endforelse --}}
    </div>
@endsection
