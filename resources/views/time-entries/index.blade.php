	@extends('layout.app')


	@section('content')

					@include('common.alert')

					<div class=" bg-gray-100 flex  justify-center items-center min-h-screen ">
					<div class=" bg-white p-4 flex shadow-lg m-6 ">



					<div class=" flex flex-col justify-center items-center">






					<div class="border-b-4  border-gray-700 p-2  flex ">

					<div class="flex "> <img src="{{ asset('/asset/images/avatar.png') }}" alt="avatar" class="h-8 w-8">

					<h1 class="uppercase m-3 ">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</h1>
					</div>
					<div class="flex">
					<form class=" flex ml-64" action="time-entries/?date" method="Get">
					<x-input type="text" name="date" onchange="this.form.submit()" class="disableFuturedate" placeholder="Pick Date"></x-input>
				
					{{-- <button type="submit">byDate</button> --}}
					</form>
					</div>


					</div>

					<div class="">

					<form class="flex m-5" id="form">


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
					</form>


					<div id="appendform" class="text-center mb-4"></div>
					<div>

					<button class="button float-left" onclick="addNewRow()"> Add row</button>
					</div>
					</div>









					</div>
					</div>


					</div>
















					</div>

					</div>

					<script>
					    let date = new Date();


					    function addNewRow() {

					        const addrow = document.getElementById('appendform')
					        const newform = document.createElement('div');

					        newform.innerHTML = `	<h1 class="text-md border-b-4 my-8 p-4">New Row</h1>	<form class="flex" id="form">


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


	   $(document).ready(function () {
      var currentDate = new Date();
      $('.disableFuturedate').datepicker({
      format: 'yyy-mm-dd',
      autoclose:true,
      endDate: "currentDate",
      maxDate: currentDate
      }).on('changeDate', function (ev) {
         $(this).datepicker('hide');
      });
      $('.disableFuturedate').keyup(function () {
         if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9^-]/g, '');
         }
      });
   });
				</script>



	@endsection
