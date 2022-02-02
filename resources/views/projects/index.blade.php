<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    @extends('layouts.navbar')

    @section('content')
        <table class="client-table">
            <thead>
                <tr>
                  <th>Projects names</th>
                  <th>Client ID</th>
                    <th>Description</th>
                    <th>Header</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr class="active-row">
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->client_id }}</td>
                        <td>{{ $project->description }}</td>
                        <td>${{ $project->budget }}</td>
                    </tr>
                @empty
                    <p>No projects in the database.</p>
                @endforelse
            </tbody>
        </table>
    @endsection

    <p> </p>


</body>

</html>
