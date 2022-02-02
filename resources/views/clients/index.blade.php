<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--css link-->
    <link rel="stylesheet" href={{ mix('css/app.css') }}>
    <title>Clients</title>
</head>

<body>
    @extends('layouts.navbar')

    @section('content')
        <table class="client-table">
            <thead>
                <tr>
                    <th>Clients names</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clients as $client)
                    <tr class="active-row">
                        <td>{{ $client->name }}</td>
                        <td>
                            <div class="clients-buttons">
                                
                                @if(Auth::User()->isAdmin() || Auth::User()-> isOwner() )
                                <a href="/clients/{{$client->id}}/edit">Edit</a>
                                @endif
                                <a href="/clients/{{$client->id}}">View</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <p>No clients in the database.</p>
                @endforelse
            </tbody>
        </table>
    @endsection
    {{-- @forelse ($clients as $client)
        <p>{{ $client->name }} {{ $client->code }}</p>
    @empty
        <p>No clients in the database.</p>
    @endforelse --}}


</body>

</html>
