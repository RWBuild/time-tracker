<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Time tracker</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>

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
                <a href="/">
                    <h1>Time tracker</h1>
                </a>
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
