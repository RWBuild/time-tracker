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

																<div>

																				@forelse ($time_entries as $timeEntry)
																								<div id="submit_changes" style="background: grey; padding: 30px; margin-bottom: 10px">
																												<form action="{{ route('time-entries.store') }}" method="POST">
																																@csrf
																																@method('post')
																																<select name="client_id" id="clients_list" onchange="getProjects(this)">
																																				<option value="">--select clients--</option>
																																				@forelse ($clients as $client)
																																								<option value="{{ $client->id }}">{{ $client->name }}</option>
																																				@empty
																																								<p>No clients for this date.</p>
																																				@endforelse
																																</select>
																																<select name="project_id" id="project_list" onchange="getTask(this)"></select>
																																<select name="task_id" id="task_list"></select>

																																<input type="text" name="duration" id="duration">
																																<input type="hidden" name="user_id" id="user_id" value="{{ Auth::User()->id }}">
																																<button type="submit" id="sub" name="save">Save</button>
																												</form>
																								</div>
																				@empty
																								<p>No entries Found</p>
																				@endforelse
																</div>



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

				<script>
				    function getProjects(obj) {
				        let clientId = obj.value;
				        fetch(`http://127.0.0.1:8000/time-entries?client=${clientId}`).then(response => {
				                response.json().then((res) => {
				                    obj.nextElementSibling.innerHTML = "";
				                    res.forEach((value) => {
				                        obj.nextElementSibling.innerHTML +=
				                            `<option value="${value.id}">${value.name}</option>`;
				                    })
				                })
				            })
				            .catch(error => {
				                console.log(error)
				            });
				    }

				    function getTask(obj) {
				        let projectId = obj.value;
				        fetch(`http://127.0.0.1:8000/time-entries?project=${projectId}`).then(response => {
				                response.json().then((res) => {
				                    obj.nextElementSibling.innerHTML = "";
				                    res.forEach((value) => {
				                        obj.nextElementSibling.innerHTML +=
				                            `<option value="${value.id}">${value.name}</option>`;
				                    })
				                })
				            })
				            .catch(error => {
				                console.log(error)
				            });
				    }

				    const all_forms = document.querySelectorAll('#submit_changes');
				    all_forms.forEach((form) => {
				        form.addEventListener('focusout', (event) => {
				            console.log(event.target.value)
				        });
				    })

				    const client_inputs = document.querySelectorAll('#clients_list');
				    client_inputs.forEach((clients) => {
				        console.log(clients.nextElementSibling.parentNode)
				    })

				    function saveChanges() {
				        // event.preventDefault();
				        let client_id = document.querySelector('#clients_list').value;
				        let project_id = document.querySelector('#project_list').value;
				        let task_id = document.querySelector('#task_list').value;
				        let duration = document.querySelector('#duration').value;
				        let user_id = document.querySelector('#user_id').value;

				        if (project_id.length == 0) {
				            alert("select project");
				        } else if (task_id.length == 0) {
				            alert("select task");
				        } else if (duration.length == 0) {
				            alert("select duration");
				        } else {
				            document.getElementById('submit_changes').submit();
				        }
				    }
				</script>

@endsection
