<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- css-link --}}
    <link rel="stylesheet" href={{ mix('css/app.css') }}>
    <title>Project: {{ $project->name }}</title>
</head>

<body>
    @extends('layouts.navbar')

    @section('content')
        <div class="user-title">
            <h1>Projects Information</h1>
        </div>
        <div class="user-info">
            <h3>Project Name: <span>{{ $project->name }}</span></h3>
            <h3>Client's Name: <span>{{ $project->client_id }}</span></h3>
            <h3>Budget: <span>+25{{ $project->budget }}</span></h3>
            <h3>Description: <span>{{ $project->description }}</span></h3>
            <h3>Time entries:</h3>
            <table class="project-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Person</th>
                        <th>Task</th>
                        <th>Duration</th>

                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($timeEntries as $time)
                        <tr class="active-row">
                            <td>{{ $time->project_id }}</td>
                            <td>{{ $time->user_id }}</td>
                            <td>{{ $time->duration }}</td>
                        </tr>
                    @endforeach --}}


                </tbody>
            </table>
        </div>
    @endsection
    {{-- <div>
    <h2>Edit {{ $project->name }}</h2>
    <p>Name: {{ $project->name }}</p>
    <p>Client: {{ $project->client_id }}</p>
    <p>{{ $project->budget }}</p>
    <p>{{ $project->description }}</p>
    <p>{{ $project->timeEntries }}</p>
  </div> --}}

</body>

</html>
