<!DOCTYPE html>
<html lang="en">

<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=
, initial-scale=1.0">
				<meta http-equiv="X-UA-Compatible" content="ie=edge">
				<title>time trucker</title>
				<link rel="stylesheet" href="{{ mix('css/app.css') }}">
                <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
				{{-- header --}}
				<div class="bg-gray-700 flex justify-between p-3  sticky top-0 z-50 ">

								<div class=" text-blue-100 text-xl">Time Tracker</div>

								<div class="mt-4" >
												<a href="/"
																class="text-md text-white dark:text-gray-500  m-2  no-underline hover:bg-gray-400 p-2 rounded-lg active:bg-white ">Home</a>
												<a href="/clients"
																class="text-md text-white dark:text-gray-500  m-2  no-underline hover:bg-gray-400 p-2 rounded-lg active:bg-white ">Clients</a>
												<a href="/projects"
																class="text-md text-white dark:text-gray-500  m-2 no-underline hover:bg-gray-400 p-2 rounded-lg active:bg-white">Projects</a>
												<a href="/time-entries"
																class="text-md text-white dark:text-gray-500 no-underline m-2 hover:bg-gray-400 p-2 rounded-lg active:bg-white">Time
																Entry</a>
								</div>
								<div class="navlink flex justfy-center items-center ">

												@if (Route::has('login'))

																@if (Auth::check())
																				<form  method="POST" action="{{ route('logout') }}">
																								@csrf
																								<button class=" text-sm  text-white rounded-lg hover:bg-red-300 p-2"
																												type="submit">Logout</button>
																				</form>
																@endif

																
																				@auth
																								@if (Auth::User()->isAdmin())
																												<a href="{{ url('/dashboard') }}" class="text-sm text-white  no-underline hover:bg-gray-400 p-2 rounded-lg ">Dashboard</a>
																								@endif
																				@else
																								<a href="{{ route('login') }}" class="text-sm text-white dark:text-gray-500 no-underline hover:bg-gray-400 p-2 rounded-lg">Log
																												in</a>

																								@if (Route::has('register'))
																												<a href="{{ route('register') }}"
																																class="ml-4 text-sm text-white dark:text-gray-500 no-underline hover:bg-gray-400 p-2 rounded-lg">Register</a>
																								@endif
																				@endauth
																
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
