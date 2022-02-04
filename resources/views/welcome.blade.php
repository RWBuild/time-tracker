	@extends('layout.app')


	@section('content')
	<div class=" h-screen bg-gray-200  sm:flex flex col justify-center items-center p-34 ">




	<div class=" flex justify-center items-center ">
	<div class=" rounded-lg w-1/2 border-4 ">
	<div class="  flex  	flex-col">
	<div class=" flex justify-center -mt-32 ">
	<span class="flex  	flex-row ">
	<h1 class="font-bold leading-6 text-3xl z-10 relative line-through ">15</h1>
	<span class="ml-2 z-10 relative">
	<p>Projects </p>
	<p>In Our Hand</p>
	</span>
	</span>
	<span class="flex  	flex-row md:ml-12 sm:ml-0">
	<h1 class="font-bold leading-6 text-3xl z-10 relative line-through ">2M</h1>

	<span class="ml-2 z-10 relative">
	<p>Clients </p>
	<p>Trust Us</p>
	</span>
	</span>
	</div>

	<div class=" text-center">

	<h1 class="font-bold md:text-2xl sm:text-sm  -mb-10 mt-8 z-10 relative text-center ">
	Hit your goals faster with time-saving features

	</h1>


	<p class="  text-center relative z-10 p-24 -mb-64">
	Know exactly where you allocate time with global and manual tracking from your desktop, mobile,
	or Chrome browser. Start and stop time, jump
	between tasks, and add details on how time was spent
	</p>


	</div>

	</div>
	</div>

	<div class=" rounded-lg  w-1/2 pr-6 border-4">

	<div class=" bg-gray-800 h-64 w-24 z-0 rounded-md top-28 absolute "></div>
	<div class=" z-10 relative   ">
	<img src="{{ asset('/asset/images/time.gif') }}" class="object-cover ml-2 rounded-r-lg h-96 w-96 ">
	</div>
	<div
	class=" bg-gray-800  sm:h-10 sm:w-10 md:h-64 md:w-24 rounded-2xl z-0 absolute bottom-0 sm:right-50 md:right-20">
	</div>
	<div class=" bg-white sm:h-10 sm:w-10 md:h-48 md:w-48 rounded-full z-0 absolute top-60 left-80">
	</div>
	<div class=" bg-blue-200 sm:h-10 sm:w-10 md:h-64 md:w-64 rounded-full z-0 absolute top-60 left-40">
	</div>
	</div>
	</div>



	</div>


	@endsection
