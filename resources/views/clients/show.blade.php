<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Client: {{ $client->name }}</title>
</head>
<body>
  
<div>
  @if (Auth::User()->isAdmin() ||  Auth::User()->isOwner())

  <button   > <a href="/clients/{{$client->id }}/edit" >edit client</a></button>
  @endif
<p>Name: {{ $client->name }}</p>
<p>Code: {{ $client->code }}</p>

<p>{{ $client->phone }}</p>
<p>{{ $client->address }}</p>


<strong>Projects</strong>
@forelse ($client->projects as $project)

<p>{{ $project->name}}</p>

<p> {{ $project->budget}}</p>

@if (Auth::User()->isAdmin() ||  Auth::User()->isOwner())

<button   > <a href="/projects/{{$project->id }}/edit" >edit</a></button>
@endif
<button   > <a href="/projects/{{$project->id }}">view</a></button>
@empty
  <p>No projects in the database.</p>

@endforelse

</div>

</body>
</html>