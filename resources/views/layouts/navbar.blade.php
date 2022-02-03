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
        <div class=" px-7 text-2xl decoration font-bold cursor-pointer">Time Tracker</div>
        <!-- NAVIGATION MENU -->
        <ul class="text-xl cursor-pointer">
            <!-- NAVIGATION MENUS -->
            <div class="flex gap-0 ">

                <li class=" hover:bg-sky-200 px-5 py-2 rounded transition-all"><a href="/clients">Clients</a></li>
                <li class=" hover:bg-sky-200 px-5 py-2 rounded transition-all"><a href="/projects">Project</a></li>
                <li class=" hover:bg-sky-200 px-5 py-2 rounded transition-all"><a href="/time-entries"></a>Time Entry</li>
                @if (Route::has('login'))
                    @auth
                        @if (Auth::User()->isAdmin())
                        
                            <li class=" hover:bg-sky-200 px-5 py-2 rounded transition-all"><a
                                href="{{ url('/dashboard') }}">Dashboard</a></li>
<<<<<<< HEAD
                            <li class=" hover:bg-sky-200 px-5 py-2 rounded transition-all"><a
                                    href="{{ route('clients.create') }}">Add a client</a></li>
=======
>>>>>>> green/main
                            
                        @endif
                    @else
                        <li class=" hover:bg-sky-200 px-5 py-2 rounded transition-all"><a href="{{ route('login') }}">Log
                                in</a></li>
                        @if (Route::has('register'))
                            <li class=" hover:bg-sky-200 px-5 py-2 rounded transition-all"><a
                                    href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                @endif
                <li >
                    <div class="hover:bg-sky-200 px-5 py-2 rounded transition-all">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" >
                            @csrf
                            @if(Auth::User())
                            <a href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                            @endif
                            
                        </a>
                        </form>
                    </div>
                </li>
            </div>
        </ul>

    </nav>
    <hr class="border-solid silver">
    {{-- End of nav bar --}}
    {{-- content --}}
    <div class="content">
        @yield('content')
    </div>

</body>

</html>
