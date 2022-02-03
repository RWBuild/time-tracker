<!DOCTYPE html>
<html lang="en">

<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=
				, initial-scale=1.0">
				<meta http-equiv="X-UA-Compatible" content="ie=edge">
				<title>time trucker</title>
				<link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
				{{-- header --}}
				<div class="bg-gray-700 text-white font-bold flex sm: justify-around md:justify-between p-4 sticky top-0 z-50 ">

								<div class=" text-blue-100 text-xl">Time Tracker</div>

								<div>
												<a href="/"
																class="text-md text-white dark:text-gray-500  m-2  no-underline hover:bg-gray-400 p-2 rounded-lg active:bg-white ">Home</a>
												<a href="/clients"
																class="text-md text-white dark:text-gray-500  m-2  no-underline hover:bg-gray-400 p-2 rounded-lg active:bg-white ">Clients</a>
												<a href="/projects"
																class="text-md text-white dark:text-gray-500  m-2 no-underline hover:bg-gray-400 p-2 rounded-lg active:bg-white">Projects</a>
												<a href="/"
																class="text-md text-white dark:text-gray-500 no-underline m-2 hover:bg-gray-400 p-2 rounded-lg active:bg-white">Time
																Entry</a>
								</div>

								<div class="navlink">

												@if (Route::has('login'))

																@if (Auth::check())
																				<form class="button" method="POST" action="{{ route('logout') }}">
																								@csrf
																								<button class=" hover:bg-gray-400 hover:text-gray-900 p-2 rounded-lg mr-64 -mt-6"
																												type="submit">Logout</button>
																				</form>
																@endif

																<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
																				@auth
																								@if (Auth::User()->isAdmin())
																												<a href="{{ url('/dashboard') }}" class="text-sm   no-underline ">Dashboard</a>
																								@endif
																				@else
																								<a href="{{ route('login') }}" class="text-sm text-white dark:text-gray-500 no-underline">Log
																												in</a>

																								@if (Route::has('register'))
																												<a href="{{ route('register') }}"
																																class="ml-4 text-sm text-white dark:text-gray-500 no-underline">Register</a>
																								@endif
																				@endauth
																</div>
												@endif

								</div>

				</div>

				{{-- end header --}}
				@yield('content')
				{{-- footer --}}

				<!-- footer -->
				<footer class=" bg-gray-700   pt-1 border-b-2  border-white  bottom-0 ">
								<div class="">
												<div class="sm:flex sm:mt-8">
																<div class=" sm:mt-0 sm:w-full sm:px-8 flex flex-col md:flex-row justify-between">
																				<div class="flex flex-col">
																								<span class="font-bold text-white uppercase ">
																												office
																								</span>

																								<span class="flex ">

																												<h3 class="text-sm font-bold  text-white">
																																xxxxx
																												</h3>
																								</span>
																								<span class="">
																												<a href="#" class="text-white  text-md hover:text-white">
																																xxxxxx
																												</a>
																								</span>
																				</div>



																				<div class="flex flex-col">
																								<span class="font-bold text-white uppercase md:mt-0 ">
																												contact
																								</span>
																								<span class="flex  ">


																												<h3 class="text-sm font-bold text-white  ">
																																xxxxxxx
																												</h3>
																								</span>
																								<span class="flex ">


																												<h3 class="text-sm font-bold  text-white">
																																xxxxxxxxx
																												</h3>
																								</span>
																				</div>


																				<div class="flex flex-col">
																								<span class="font-bold text-white uppercase  md:mt-0 ">
																												contact
																								</span>
																								<span class="flex  ">


																												<h3 class="text-sm font-bold text-white  ">
																																yyyyyyyy
																												</h3>
																								</span>
																								<span class="flex ">


																												<h3 class="text-sm font-bold  text-white">
																																yellow@gmail.com
																												</h3>
																								</span>
																				</div>
																</div>
												</div>
								</div>

								<div class="container mx-auto ">
												<div class="mt-16 border-t-2 border-white flex flex-col items-center">
																<div class="sm:w-2/3 flex space-x-20 items-center text-center ">
																				<p class="text-sm text-white font-bold py-2 ">
																								© 2021 by yellow team
																				</p>


																</div>
												</div>
								</div>
				</footer>

				{{-- end footer --}}
</body>

</html>
