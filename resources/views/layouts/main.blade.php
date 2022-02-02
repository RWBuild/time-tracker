<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Time tracker</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    {{-- <link rel="stylesheet" href="{{mix('/css/styles.css')}}"> --}}
</head>

<body>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
    <div class="pages">
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
                        @else
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit">Logout</button>
                            </form>
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
        @yield('content')
    </div>
</body>

</html>
