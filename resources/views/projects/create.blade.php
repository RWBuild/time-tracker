@extends('layout.app')


@section('content')
				<div class=" bg-gray-200 flex flex-col justify-center items-center min-h-screen">

<header class="font-bold text-xl text-center text-gray-700 m-4"> Add Project</header>
<form action="{{ route('projects.store') }}" method="POST">
	@csrf
	@method('post')
	<div class="input-field">
					<x-label>Client</x-label>
<select name="client_id"
	class="rounded-md shadow-sm border-gray-300 m-2 focus:border-indigo-300 w-64focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

	<option>Select Client..</option>
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
	<x-input type="text" id="" name="name" placeholder="Project Name"></x-input>

	<div class="error">
					@error('name')
									{{ $message }}
					@enderror
	</div>



	</div>


	<div class="input-field">
<x-label>Budget</x-label>
<x-input type="text" id="budget" name="budget" placeholder="Budget"></x-input>
<div class="error">
				@error('budget')
								{{ $message }}
				@enderror
				</ div>
</div>



<div class="input-field">
				<x-label>description</x-label>

<textarea id="description" name="description" placeholder="description"
				class="rounded-md shadow-sm border-gray-300 m-2 focus:border-indigo-300 
focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-64"></textarea>

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
</div>

@endsection
