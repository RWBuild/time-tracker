@extends('layouts.main')

@section('header')
    <div class="navbar">
        <div>
            <h1>Time tracker</h1>
        </div>
        <div>
            <a href="">Clients</a>
            <a href="">Projects</a>
            <a href="">Time entry</a>
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
            @endif
        </div>
    </div>
@endsection

@section('content')
    <div class="home_page">
        <h1>Welcome</h1>
        <h2>Time tracker</h2>
    </div>
@endsection