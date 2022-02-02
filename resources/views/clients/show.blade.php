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
            <h3>Phone Number: <span>+250 {{ $client->phone }}</span></h3>
            <h3>Address: <span>{{ $client->address }}</span></h3>
            <h3>Projects:</h3>
            <table class="project-table">
                <thead>
                    <tr>
                        <th>Projects names</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="active-row">
                        <td>alice</td>
                        <td>
                            <div class="project-buttons">
                                <a href="/favorites">Edit</a>
                                <a href="/clients/{id}">View</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- <p>Name: {{ $client->name }}</p>
  <p>Code: {{ $client->code }}</p>
  
  <p>{{ $client->phone }}</p>
  <p>{{ $client->address }}</p> --}}
    @endsection
    <div>


    </div>

</body>

</html>
