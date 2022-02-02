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
                
            </tbody>
        </table>

        @forelse ($clientWithProject as $client)
                    <tr class="active-row">
                        <td>{{ $client->name }}</td>
                    </tr>
                    <h3>{{ $client->name }} projects</h3>
                    <div style="margin-left: 30px">
                      
                      @forelse ($client->projects as $project)
                          <tr>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->budget }}</td>
                          </tr>
                          <br>
                      @empty
                        <p>No projects in the database.</p>
                      @endforelse
                    </div>
                @empty
                      <p>No projects in the database.</p>
                @endforelse
    @endsection

</body>

</html>
