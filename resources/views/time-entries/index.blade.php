<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script defer src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    {{-- <script defer src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}

    <title>Document</title>

</head>

<body>
    @extends('layouts.navbar')

    @section('content')

        <div class="time_container" id="entry_container">
            <div class="info_container">
                <div class="icon">
                    <i class="fa fa-user text-3xl"></i>
                    <button class="text-3xl">
                        {{ Auth::user()->name }}
                    </button>
                </div>
                <div class="date">
                    <form action="{{ route('getDate') }}" method="GET">
                        <input type="date" onchange="this.form.submit()" name="date" value="<?php echo date('Y-m-d'); ?>"
                            id="date-input">
                    </form>
                </div>
            </div>
            <form>
                @forelse ($timeEntries as $timeEntry)
                    <div class="row_container">
                        <div class="select_field">
                            <label for="client">company Name:</label>
                            <select>
                                @forelse ($clients as $client)
                                    <option @if ($client->id == $timeEntry->project->client->id)
                                        selected
                                @endif
                                >{{ $client->name }}</option>
                            @empty
                                <p>No Client</p>
                @endforelse
                </select>
        </div>
        <div class="select_field">
            <label for="projects">Project Name:</label>
            <select id="client">
                @forelse($timeEntry->project->client->projects as $project)
                    <option @if ($timeEntry->project_id == $project->id)
                        selected
                @endif

                value="{{ $project->id }}">
                {{ $project->name }}
                </option>
            @empty
                <option>no project</option>
                @endforelse
            </select>
        </div>
        <div class="select_field">
            <label for="task">Task:</label>
            <select id="task">
                <option>-- Select Task --</option>
                @foreach ($tasks as $task)
                    <option @if ($task->id == $timeEntry->task_id)
                        selected
                @endif
                value={{ $task->id }}>{{ $task->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="select_field">
            <label for="time">Duration:</label>
            <input id="duration" type="text" value="{{ gmdate('H:i', $timeEntry->duration * 60) }} ">
        </div>
        {{-- <div class="select_field">
            <label for="time"></label>
            <button type="submit" id="submit">Save</button>
        </div> --}}
        </div>
    @empty
        <p>Empty</p>
        @endforelse
        <div id="form-container"></div>
        </form>

        </div>

        <div class="row_button"><button onclick="getContainer()">Add row</button></div>
    @endsection
    <script src="{{ url('/js/time_entry.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</body>

</html>
