<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $client->name }}</title>
</head>

<body>
    @extends('layouts.navbar')

    @section('content')
        <div class="user-title">
            <h1>User information</h1>
        </div>
        <div class="user-info">
            <h3>Name: <span>{{ $client->name }}</span></h3>
            <h3>Code: <span>{{ $client->code }}</span></h3>
            <h3>Phone Number: <span>{{ $client->phone }}</span></h3>
            <h3>Address: <span>{{ $client->address }}</span></h3>
            <h3>Projects:</h3>
            <table class="project-table">
                <thead>
                    <tr>
                        <th>Projects names</th>
                        <th>Budget</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($client->projects as $project)
                        <tr class="active-row">
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->budget }}</td>
                            <td>
                                <div class="project-buttons">
                                    @if (Auth::User()->isAdmin() || Auth::User()->isOwner())
                                        <a href="/projects/{{ $project->id }}/edit">Edit</a>
                                    @endif
                                    <a href="/projects/{{ $project->id }}">View</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <p>No projects available here yet...</p><br>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endsection
    <div>


    </div>
    <script src="{{url('/js/currency.js')}}"></script>
</body>

</html>
