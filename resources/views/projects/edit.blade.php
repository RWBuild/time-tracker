@extends('layouts.main')


@section('content')
    <div class="form_page">

        <form action="" method="POST">
            @csrf
            @method('put')
            <h1>Edit project</h1>
          
            <input type="text" placeholder="Add Name" name="name" value="{{ $project->name }}" />
            @error('name')
                <span>
                    {{ $message }}
                </span>
            @enderror
            <input type="text" placeholder="Add Code" name="client_id" value="{{ $project->client_id }}" />
            @error('client_id')
                <span>
                    {{ $message }}
                </span>
            @enderror
            <input type="text" placeholder="Add Address" name="budget" value="{{ $project->budget }}" />
            @error('budget')
                <span>
                    {{ $message }}
                </span>
            @enderror
            <textarea placeholder="Description" name="description" value="{{ $project->description }}" ></textarea>
            @error('description')
                <span>
                    {{ $message }}
                </span>
            @enderror

            <button type="submit"> Edit</button>
        </form>

    </div>
@endsection



{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>

    <div>
        <h2>Edit {{ $project->name }}</h2>
        <p>Name: {{ $project->name }}</p>
        <p>Client: {{ $project->client_id }}</p>
        <p>{{ $project->budget }}</p>
        <p>{{ $project->description }}</p>
    </div>

</body>

</html> --}}
