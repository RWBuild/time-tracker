@extends('layout.app')


@section('content')

				<div class=" bg-gray-100 flex  justify-center items-center min-h-screen">



								<div class=" bg-white p-4 flex shadow-lg ">


												{{-- clients details --}}



												<div class="border-r-4 px-32 m-2 border-gray-700 flex flex-col justify-center items-center">

																<div class="p-2 ">

																				<h1 class="text-center border-b-4 m-2 mb-5 border-gray-700"> Clients</h1>
																				<div class="">
																								<p class="font-semibold">Name: {{ $client->name }}</p>

																								<p>Code: {{ $client->code }}</p>
																				</div>
																				<div class="m-2">

																								<p>+250{{ $client->phone }}</p>
																								<p>{{ $client->address }}</p>



																				</div>

																</div>
																@if (Auth::User()->isAdmin() || Auth::User()->isOwner())

																				<button class="button w-32"> <a href="/clients/{{ $client->id }}/edit">edit client</a></button>

																@endif

												</div>
												{{--  --}}










												{{-- project details --}}

												<div class="flex flex-col justify-center items-center m-2">
																<strong class=" border-b-4 p-4 m-2 border-gray-700">Projects</strong>
																@forelse ($client->projects as $project)
																				<div class="">



																								<p class="font-bold">{{ $project->name }}</p>

																								<p> ${{ $project->budget }}</p>

																								<div class="card-body">

																												@if (Auth::User()->isAdmin() || Auth::User()->isOwner())

																																<button class="btn-card"> <a
																																								href="/projects/{{ $project->id }}/edit">edit</a></button>
																												@endif
																												<button class="btn-card"> <a href="/projects/{{ $project->id }}">view</a></button>




																								</div>
																				</div>
																@empty
																				<p>No projects in the database.</p>

																@endforelse

												</div>

												{{--  --}}





								</div>

				</div>

@endsection
