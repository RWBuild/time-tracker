<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<<<<<<< HEAD
=======
    {{-- css-link --}}
    <link rel="stylesheet" href={{ mix('css/app.css') }}>
>>>>>>> green/main
    <title>Document</title>
</head>

<body>

    @extends('layouts.navbar')

    @section('content')
<<<<<<< HEAD
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

=======
    @if (session('message'))
            <div class="alert alert-success client-alert">{{ session('message') }}</div>
        @endif
        <div class="project-add">
            <a href="/projects/create">Add a project</a>
        </div>
        <div class="card_set">
            <!--card1 -->
            @forelse ($clientWithProject as $client)
                <div class="card">
                    <div class="title">
                        <h1>Client's name: {{ $client->name }}</h1>
                    </div>
                    <div class="project-table">
                        <table class="clientproject-table">
                            
                                <tr>
                                <td>Project Name</td>
                                <td>Budget</td>
                                <td>Action</td>
                                </tr>
                            
                            <tbody>
                                @forelse ($client->projects as $project)
                                    <tr class="project-2">
                                        <td>{{ $project->name }}</td>
                                        <td>${{ $project->budget }}</td>
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
                                    <td>No projects available here yet...</td>
                                @endforelse
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
>>>>>>> green/main
</body>

</html>
