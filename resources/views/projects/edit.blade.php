<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Edit: {{ $project->name }}</title>
</head>

<body>

    @extends('layouts.navbar')

    @section('content')
        <div class="center">
            <h1>Edit a Project</h1>
            <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form action="{{ route('projects.update', $project->id) }}" method="post">
                @csrf
                @method('put')
                <div class="txt_field">
                    <select name="client_id" id="person_id" required>
                        <option value="">Select a client</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="txt_field">
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="{{ $project->name }}" required>
                </div>
                <div class="txt_field">
                    <label for="budget">Budget:</label>
                    <input type="text" name="budget" value="{{ $project->budget }}" required>
                </div>
                <div class="txt_field">
                    <label for="Description">Description:</label>
                    <textarea name="description" id="" cols="55" rows="3">{{ $project->description }}</textarea>
                </div>
                <div class="txt_field">
                    <input type="submit" value="Add">
                </div>
            </form>
        </div>
    @endsection
    {{-- <div>
  <h2>Edit {{ $project->name }}</h2>
  <p>Name: {{ $project->name }}</p>
  <p>Client: {{ $project->client_id }}</p>
  <p>{{ $project->budget }}</p>
  <p>{{ $project->description }}</p>
</div> --}}

</body>

</html>
