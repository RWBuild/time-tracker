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
<<<<<<< HEAD
    
    @extends('layouts.navbar')

    @section('content')
        <table class="client-table">
            <thead>
                <tr><td colspan="2" class="active-row"><center>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </center></td></tr>
                <tr>
                    <th colspan="2">Clients names</th>
                    
                </tr>
                
            </thead>
            <tbody>
                @forelse ($clients as $client)
               
=======
    @extends('layouts.navbar')

    @section('content')
    @if (session('message'))
            <div class="alert alert-success client-alert">{{ session('message') }}</div>
        @endif
        @if (Route::has('login'))
            @auth
                @if (Auth::User()->isAdmin())
                    <div class="client-add">
                        <a href="{{ route('clients.create') }}">Add
                            a client</a>
                    </div>

                @endif
            @endauth
        @endif
        <table class="client-table">
            <thead>
                <tr>
                    <th>Clients names</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clients as $client)
>>>>>>> green/main
                    <tr class="active-row">
                        <td>{{ $client->name }}</td>
                        <td>
                            <div class="clients-buttons">
<<<<<<< HEAD
                                
                                @if(Auth::User()->isAdmin() || Auth::User()-> isOwner() )
                                <a href="/clients/{{$client->id}}/edit">Edit</a>
                                @endif
                                <a href="/clients/{{$client->id}}">View</a>
=======

                                @if (Auth::User()->isAdmin() || Auth::User()->isOwner())
                                    <a href="/clients/{{ $client->id }}/edit">Edit</a>
                                @endif
                                <a href="/clients/{{ $client->id }}">View</a>
>>>>>>> green/main
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
