@extends('layouts.main')

@section('content')
    @if (session('success'))
        <div class="flex justify-center flex-wrap w-11/12 mx-auto">
            @component('components.card')
                @slot('content')
                    <p class="text-green-600">{{ session('success') }}</p>
                @endslot
            @endcomponent
        </div>
    @endif
    <div class="mx-20 flex flex-col items-center">
        <div class="bg-white my-5 flex justify-between p-5 items-center w-full">
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

        <form action="" class="bg-white p-5">
            @csrf
            @foreach ($nowEntry as $timeEntry)
                <div>
                    <select class="w-60">
                        <option value="">{{ $timeEntry->project->client->name }}
                        </option>
                    </select>
                    <select class="w-60">
                        <option value="{{ $timeEntry->project_id }}">{{ $timeEntry->project->name }}</option>
                    </select>
                    <select class="w-60">
                        <option value="{{ $timeEntry->task_id }}">{{ $timeEntry->task->name }}</option>
                    </select class="w-60">
                    <input class="w-60 rounded border border-sky-500" type="text"
                        value="{{ intdiv($timeEntry->duration, 60) . ':' . $timeEntry->duration % 60 }}"
                        placeholder="duration" />
                </div>
            @endforeach
            <hr class="mb-5 border-2 border-gray-700">
        </form>

        <div id="form"></div>

        <script>
            function appendForm() {
                const newrow = document.getElementById('form');
                const form = document.createElement('div')
                form.innerHTML = `
            <form action="{{ route('time-entries.store') }}" method="POST">
              @csrf
              <input type='hidden' name='date' value='{{ date_format(now(), 'Y-m-d') }}' />
              <input type='hidden' name='user_id' value='{{ Auth::user()->id }}' />
              <select class="w-48">
                <option value="">-----Select client-----</option>
                  @foreach ($clients as $client)
                  
                      <option value="{{ $client->id }}">{{ $client->name }}</option>
                  @endforeach
              </select>
              <select name='project_id' class="w-48">
                  @foreach ($projects as $project)
                      <option value="{{ $project->id }}">{{ $project->name }}</option>
                  @endforeach
              </select>
              <select name='task_id' class="w-48" >
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
    </div>
@endsection
