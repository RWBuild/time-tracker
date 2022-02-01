@extends('layouts.main')

@section('header')
    <div class="navbar">
        <div>
            <h1>Time tracker</h1>
        </div>
        <div>
            <a href="/clients">Clients</a>
            <a href="/projects">Projects</a>
            <a href="/time-entries">Time entry</a>
        </div>
        <div>
            @if (Route::has('login'))
                @auth
                    @if (Auth::User()->isAdmin())
                        <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 ">Register</a>
                    @endif
                @endauth
                @if (Auth::user())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit">Logout</button>
                    </form>
                @endif
            @endif
        </div>
    </div>

@section('content')


    <h2> List of Clients</h2>
    <div class="clients_container">
        <table>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Code</th>
                <th>adress</th>
                <th></th>
            <tr>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>
                                {{ $client->id }}
                            </td>
                            <td>
                                {{ $client->name }}
                            </td>

                            <td>
                                {{ $client->code }}
                            </td>

                            <td>
                                {{ $client->address }}
                            </td>
                            <td class="action">
                                <a href="/clients/{{ $client->id }}" class="action-view">view</a>

                                <form method="POST" action="">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="">Edit</button>
                                </form>
                            </td>
                        </tr>
                </tbody>
                @endforeach
        </table>
    </div>
    <button><a href="/clients/create">Add Clients</a></button>
@endsection
