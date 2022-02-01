<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--css link-->
    <link rel="stylesheet" href={{ mix('css/app.css') }}>
    <title>navbar</title>
</head>

<body>
    <nav class="flex items-center justify-between p-5 ">
        <!-- LOGO -->
        <div class="text-2xl decoration">Time Tracker</div>
        <!-- NAVIGATION MENU -->
        <ul class="text-xl">
            <!-- NAVIGATION MENUS -->
            <div class="flex gap-0 ">

                <li class=" hover:bg-sky-200 px-5 py-2 rounded transition-all"><a href="/clients">Clients</a></li>
                <li class=" hover:bg-sky-200 px-5 py-2 rounded transition-all"><a href="#">Project</a></li>
                <li class=" hover:bg-sky-200 px-5 py-2 rounded transition-all"><a href="#"></a>Time Entry</li>
                @if (Route::has('login'))
                    @auth
                        @if (Auth::User()->isAdmin())
                            <li class=" hover:bg-sky-200 px-5 py-2 rounded transition-all"><a
                                    href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @endif
                    @else
                        <li class=" hover:bg-sky-200 px-5 py-2 rounded transition-all"><a
                                href="{{ route('login') }}">Log in</a></li>
                        @if (Route::has('register'))
                            <li class=" hover:bg-sky-200 px-5 py-2 rounded transition-all"><a
                                    href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                @endif

            </div>
        </ul>

    </nav>
    {{-- End of nav bar --}}
    {{-- content --}}
    <div class="content">
        @yield('content')
    </div>

</body>

</html>
