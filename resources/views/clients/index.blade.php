@extends('layout.app')


@section('content')



				<div class="flex justify-center items-center  bg-gray-100 sticky top-0 z-50 ">
								<h1 class="font-bold text-4xl text-center text-gray-700 m-3 p-4">Clients</h1>
								@if (Auth::User()->isAdmin() || Auth::User()->isOwner())

												<button class="button w-32 ml-24"> <a href="/clients/create" class="">add clients</a></button>

								@endif

				</div>

				<div class="   flex  flex-wrap pl-28  gap-1 p-5 ">





								@forelse ($clients as $client)

												{{--  --}}

												<div class="card mb-4 ">

																<div class="my-2 ">
																				<h3 class="font-bold">Name: {{ $client->name }} </h3>


																				<p class="m-1"> Code: {{ $client->code }}</p>

																				<p class="m-2"> Phone: {{ $client->phone }}</p>



																</div>
																<div class="  flex justify-between  ">
																				@if (Auth::User()->isAdmin() || Auth::User()->isOwner())

																								<button class="btn-card"> <a href="/clients/{{ $client->id }}/edit"
																																class="">edit</a></button>
																				@endif

																				<button class="btn-card"> <a href="/clients/{{ $client->id }}">view</a></button>


																</div>


												</div>



								@empty

												<p>No clients in the database.</p>


								@endforelse




				</div>




@endsection
