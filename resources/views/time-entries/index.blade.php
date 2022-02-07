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
           
                
                @forelse ($timeEntries as $timeEntry)
                <form method="post">
                    <div class="row_container">
                        <div class="select_field">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="date" style="display: none" name="date" value="<?php echo date('Y-m-d'); ?>"id="date-hide">
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
            <select name="project_id" id="client">
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
            <select name="task_id" id="task">
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
            <input name="duration"id="duration" type="text" value="{{ gmdate('H:i', $timeEntry->duration * 60) }} ">
        </div>
        {{-- <div class="select_field">
            <label for="time"></label>
            <button type="submit" id="submit">Save</button>
        </div> --}}
        </div>
    @empty
        <p>Empty</p>
        @endforelse
        
        </form>
        <div id="form-container"></div>
        <script>
function getContainer() {
    const row = document.getElementById("form-container");
    const node = document.createElement("div");
    
    node.innerHTML = `
    <form action="{{ route('time-entries.store') }}" method="POST">
        @csrf
   <div class="row_container">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
        <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>"id="date-hide">
            <div class="select_field">
           <label for="company_name">company Name:</label>
           <select name="client_id">
            @forelse ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @empty
                    <option>No client</option>
                @endforelse
           </select>
       </div>
       <div class="select_field">
           <label for="project_name">project Name:</label>
           <select name="project_id">
            @forelse ($projects as $project)
                     <option value="{{ $project->id }}">{{ $project->name }}</option>
                 @empty
                     <option>no project</option>
                 @endforelse
           </select>
       </div>

       <div class="select_field">
           <label for="task">Task:</label>
           <select name="task_id">
            @forelse ($tasks as $task)
                    <option value="{{ $task->id }}">{{ $task->name }}</option>
                @empty
                    <option>No task</option>
                @endforelse
           </select>
       </div>

       <div class="select_field">
           <label for="time">time:</label>
           <input type="text" name="duration">
       </div>
       <div class="select_field">
           <label for="time"></label>
           <button type="submit">Save</button>
       </div>
   </div>
   </form>`;
    row.appendChild(node);
    document.getElementById('date-hide').style.display='none';
}


        </script>
        </div>

        <div class="row_button"><button onclick="getContainer()">Add row</button></div>
    @endsection
    <script src="{{ url('/js/time_entry.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</body>

</html>
