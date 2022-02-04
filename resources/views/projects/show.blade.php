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
        <div class="project-title">
            <h1>Projects Information</h1>
        </div>
        <div class="project-info">

            <h3>Project Name: <span>{{ $project->name }}</span></h3>
            <h3>Client's Name: <span>{{ $project->client_id }}</span></h3>
            <h3>Budget: <span>${{ number_format($project->budget, 2) }}</span></h3>
            <h3 class="project-description">Description: <span>{{ $project->description }}</span></h3>
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
                    @php
                        $totalDuration = 0;
                    @endphp
                    @forelse($project->timeEntries as $time)

                        @php
                            $totalDuration += $time->duration;
                        @endphp
                        <tr class="active-row">
                            <td>{{ $time->date }}</td>
                            <td>{{ $time->user->name }}</td>
                            <td>{{ $time->task->name }}</td>
                            <td>{{ gmdate('H:i', $time->duration * 60) }}</td>
                        </tr>
                    @empty
                        <td>No time Entries yet...</td>
                    @endforelse
                    <tr>
                        <td class="font-semibold">Total Duration: {{ gmdate('H:i', $totalDuration * 60) }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="showproject-buttons">
                @if (Auth::User()->isAdmin() || Auth::User()->isOwner())
                    <a href="/projects/{{ $project->id }}/edit">Edit</a>
                @endif
            </div>
        </div>
    @endsection
</body>

</html>
