@extends('layout.app')


@section('content')

				@include('common.alert')

				@forelse ($currentTimeEntries as $timeEntry)
								<p>{{ $timeEntry->project->name }} {{ $timeEntry->duration }}</p>
				@empty
								<p>No time entries for this date.</p>
				@endforelse

				<div class=" bg-gray-100 flex  justify-center items-center min-h-screen">
								<div class=" bg-white p-4 flex shadow-lg ">

												{{-- clients details --}}

												<div class=" flex flex-col justify-center items-center">

																<div class="p-2 ">
																				@include('common.alert')
																				<div class="border-b-4  border-gray-700 p-2  flex ">
																								<div class="flex "> <img src="{{ asset('/asset/images/avatar.png') }}" alt="avatar"
																																class="
h-8 w-8">
																												<h1 class="uppercase m-3 ">yvan</h1>
																								</div>

																								<form class=" flex ml-64" action="time-entries" method="Get">
																												<input type="date" name="date" />
																												<button type="submit">byDate</button>
																								</form>

																				</div>
																				<div class=" my-4">
																								<div class="">
																												@forelse ($filteredTimeEntries as $timeEntry)
																																<form class="flex" id="form" action="time-entries" method="GET">
																																				<div class="input-field">
																																								<x-label>Client</x-label>
																																								<select name="client_id"
																																												class="rounded-md shadow-sm border-gray-300 m-2 focus:border-indigo-300 w-64 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
																																												<option>new client </option>
																																												@foreach ($clients as $client)
																																																<option value={{ $client->id }}>{{ $client->name }}</option>
																																												@endforeach
																																								</select>
																																								<div class="error">
																																												@error('address')
																																																{{ $message }}
																																												@enderror

																																								</div>
																																				</div>
																																				<div class="input-field">
																																								<x-label>project</x-label>
																																								<select name="client_id"
																																												class="rounded-md shadow-sm border-gray-300 m-2 focus:border-indigo-300 w-64 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

																																												type
																																												<option>Select project..</option>

																																												<option>new project</option>




																																								</select>



																																								<div class="error">
																																												@error('address')
																																																{{ $message }}
																																												@enderror

																																								</div>


																																				</div>
																																				{{-- slect project name --}}
																																				<div class="input-field">
																																								<x-label>Task</x-label>
																																								<select name="client_id"
																																												class="rounded-md shadow-sm border-gray-300 m-2 focus:border-indigo-300 w-64 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">


																																												<option>Select Task..</option>

																																												<option>task </option>




																																								</select>



																																								<div class="error">
																																												@error('address')
																																																{{ $message }}
																																												@enderror

																																								</div>


																																				</div>
																																				{{-- task --}}

																																				<div class="input-field">
																																								<x-label>duration</x-label>
																																								<x-input type="number" name="duration" placeholder="duration" value=""></x-input>



																																								<div class="error">
																																												@error('address')
																																																{{ $message }}
																																												@enderror

																																								</div>


																																				</div>
																																</form>
																												@empty

																												@endforelse

																												<div id="appendform" class="text-center m-4"></div>
																												<div>
																																<button class="button float-left" onclick="addNewRow()"> Add row</button>
																												</div>
																								</div>









																				</div>
																</div>


												</div>
												{{--  --}}















								</div>

				</div>

				<script>
				    let date = new Date();


				    function addNewRow() {

				        const addrow = document.getElementById('appendform')
				        const newform = document.createElement('div');

				        newform.innerHTML = `	<h1 class="text-md border-b-4 my-8">New Row</h1>	<form class="flex" id="form">


																																<div class="input-field">
																																				<x-label>Client</x-label>
																																				<select name="client_id"
																																								class="rounded-md shadow-sm border-gray-300 m-2 focus:border-indigo-300 w-64 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">


																																								<option>Select Client..</option>

																																								<option>new client </option>




																																				</select>



																																				<div class="error">
																																								@error('address')
																																												{{ $message }}
																																								@enderror

																																				</div>


																																</div>

																																<div class="input-field">
																																				<x-label>project</x-label>
																																				<select name="client_id"
																																								class="rounded-md shadow-sm border-gray-300 m-2 focus:border-indigo-300 w-64 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">


																																								<option>Select project..</option>

																																								<option>new project</option>




																																				</select>



																																				<div class="error">
																																								@error('address')
																																												{{ $message }}
																																								@enderror

																																				</div>


																																</div>
																																{{-- slect project name --}}
																																<div class="input-field">
																																				<x-label>Task</x-label>
																																				<select name="client_id"
																																								class="rounded-md shadow-sm border-gray-300 m-2 focus:border-indigo-300 w-64 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">


																																								<option>Select Task..</option>

																																								<option>task </option>




																																				</select>



																																				<div class="error">
																																								@error('address')
																																												{{ $message }}
																																								@enderror

																																				</div>


																																</div>
																																{{-- task --}}

																																<div class="input-field">
																																				<x-label>duration</x-label>
																																				<x-input type="number" name="duration" placeholder="duration"></x-input>



																																				<div class="error">
																																								@error('address')
																																												{{ $message }}
																																								@enderror

																																				</div>


																																</div>
																												</form>`;
				        addrow.appendChild(newform)


				    }
				</script>

@endsection
