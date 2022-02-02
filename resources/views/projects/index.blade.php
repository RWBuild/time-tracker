<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{ mix('css/app.css') }}>
    <title>Document</title>
</head>

<body>

    @extends('layouts.navbar')

    @section('content')
        <div class="project-add">
            <a href="/projects/create">Add a project</a>
        </div>
        <div class="card_set">
            <!--card1 -->
            @forelse ($clientWithProject as $client)
                <div class="card">
                    <div class="title">
                        <h1>{{ $client->name }}</h1>
                    </div>
                    <div class="project-table">
                        <table class="clientproject-table">
                            <tbody>
                                @forelse ($client->projects as $project)
                                    <tr class="project-2">
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td>${{ $project->budget }}</td>
                                        <td>
                                            <div class="project-buttons">
                                                <a href="/projects/{{ $project->id }}/edit">Edit</a>
                                                <a href="/projects/{{ $project->id }}">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No projects available here yet...</p><br>
                                @endforelse
                                <!-- and so on... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            @empty
                <p>No projects in the database.</p><br>
            @endforelse
        </div>
    @endsection


    {{-- @forelse ($clientWithProject as $client)
        <tr class="active-row">
            <td>{{ $client->name }}</td>
        </tr>
        <h3>{{ $client->name }} Project</h3><br>
        <div></div>
        @forelse ($client->projects as $project)
            <tr class="active-row">
                <td>{{ $project->name }}</td>
                <td>{{ $project->description }}</td>
                <td>${{ $project->budget }}</td>
            </tr>
        @empty
            <p>No projects in the database.</p><br>
        @endforelse
        </div>
    @empty
        <p>No projects in the database.</p><br>
    @endforelse --}}
</body>

</html>
