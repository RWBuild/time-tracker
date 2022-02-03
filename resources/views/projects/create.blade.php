<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Project</title>
</head>

<body>

    @extends('layouts.navbar')

    @section('content')
        <div class="center">
            <h1>Add a Project</h1>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form action="{{ route('projects.store') }}" method="post">
                @csrf
                <div class="txt_field">
                    <select name="client_id" id="person_id" required>
                        <option value="">Select a client</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="txt_field">
                    <input type="text" name="name" placeholder="Project-Name.." required>
                </div>
                <div class="txt_field">
                    <input type="text" name="budget" placeholder="Your Budget..." required>
                </div>
                <div class="txt_field">
                    <textarea name="decription" id="" cols="55" rows="3"
                        placeholder="Add your decription here.."></textarea>
                </div>
                <div class="txt_field">
                    <input type="submit" value="Add">
                </div>
            </form>
        </div>
    @endsection

</body>

</html>
