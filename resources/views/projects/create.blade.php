@extends('layout.app')


@section('content')
				<div class=" bg-gray-100 flex flex-col justify-center items-center min-h-screen">

								<header class="font-bold text-xl text-center text-gray-700 m-4"> Add Project</header>
								<form action="{{ route('projects.store') }}" method="POST">
												@csrf
												@method('post')
												<div class="input-field">
																<x-label>Client</x-label>
																<select name="client_id">


																				@foreach ($clients as $client)

																								<option value="{{ $client->id }} ">{{ $client->name }} </option>

																				@endforeach


																</select>



																<div class="error">
																				@error('address')
																								{{ $message }}
																				@enderror

																</div>


												</div>

												<div class="input-field">
																<x-label> Project name</x-label>
																<input type="text" id="" name="name">

																<div class="error">
																				@error('name')
																								{{ $message }}
																				@enderror
																</div>



												</div>


												<div class="input-field">
																<x-label>Budget</x-label>
																<input type="text" id="budget" name="budget">
																<div class="error">
																				@error('budget')
																								{{ $message }}
																				@enderror
																				</ div>
																</div>



																<div class="input-field">
																				<x-label>description</x-label>

																				<textarea id="description" name="description"></textarea>

																				<div class="error">
																								@error('description')
																												{{ $message }}
																								@enderror

																				</div>


																</div>

																<div class="flex justify-center">
																				<button type="submit" class="button">Submit</button>
																</div>





								</form>

				</div>

@endsection
