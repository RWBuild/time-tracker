<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Project: {{ $project->name }}</title>
</head>
<body>
  @extends('layouts.navbar')

    @section('content')

    @endsection
  <div>
    <h2>Edit {{ $project->name }}</h2>
    <p>Name: {{ $project->name }}</p>
    <p>Client: {{ $project->client_id }}</p>
    <p>{{ $project->budget }}</p>
    <p>{{ $project->description }}</p>
    <p>{{ $project->timeEntries }}</p>
  </div>

</body>
</html>