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
                             <x-input type="text" name="date" onchange="this.form.submit()" class="disableFuturedate"
                                 placeholder="Pick Date"></x-input>

                             {{-- <button type="submit">byDate</button> --}}
                         </form>
                     </div>
                 </div>

                 {{-- EACH FORM INPUTS --}}
                <div class="">
                     @forelse ($time_entries as $timeEntry)
                     <span>{{$timeEntry->id}}</span>
                     <form action="{{ route('time-entries.update', $timeEntry->id) }}" method="POST" class="flex m-5" id="form">
                        @csrf
                        @method('put')
                         <div class="input-field">
                             <x-label>Client</x-label>
                             <select name="client_id" id="clients_list" onchange="getProjects(this)" class="rounded-md shadow-sm border-gray-300 m-2 focus:border-indigo-300 w-64 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">--select clients--</option>
                                @forelse ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @empty
                                    <p>No clients for this date.</p>
                                @endforelse
                             </select>
                             <div class="error">
                                 @error('address')
                                     {{ $message }}
                                 @enderror
                             </div>
                         </div>
                         <div class="input-field">
                             <x-label>project</x-label>
                             <select name="project_id" id="project_list" disabled onchange="getTask(this)" class="rounded-md shadow-sm border-gray-300 m-2 focus:border-indigo-300 w-64 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option>---Select project--</option>
                                @forelse ($projects as $project)
                                    <option value="{{ $project->id }}" @if ($project->id == $timeEntry->project_id) selected @endif>{{ $project->name }}</option>
                                @empty
                                    <p>No project for this date.</p>
                                @endforelse
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
                             <select name="task_id" disabled id="task_list" class="rounded-md shadow-sm border-gray-300 m-2 focus:border-indigo-300 w-64 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option>--Select Task--</option>
                                    @forelse ($tasks as $task)
                                        <option value="{{ $task->id }}" @if ($task->id == $timeEntry->task_id) selected @endif>{{ $project->name }}</option>
                                    @empty
                                        <p>No project for this date.</p>
                                    @endforelse
                             </select>
                             <div class="error">
                                 @error('address')
                                     {{ $message }}
                                 @enderror
                             </div>
                         </div>


                         {{-- duration --}}
                         <div class="input-field">
                             <x-label>duration</x-label>
                             <x-input type="text" disabled id="duration" name="duration" placeholder="duration" value="{{ floor($timeEntry->duration / 60) . ':' . ($timeEntry->duration - floor($timeEntry->duration / 60) * 60) }}"></x-input>
                             <div class="error">
                                 @error('address')
                                     {{ $message }}
                                 @enderror
                             </div>
                         </div>

                         {{-- HIDDEN USER ID --}}
                         <input type="hidden" name="user_id" id="user_id" value="{{ Auth::User()->id }}">

                         <button type="submit">update</button>
                     </form>
                @empty
                    <p>No entries Found</p>
                 @endforelse
                <div id="appendform" class="text-center mb-4"></div>
                <div>
                    <button class="button float-left" onclick="addNewRow()"> Add row</button>
                    <div id="msg"></div>
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

            document.getElementById('msg').innerHTML = "Preparing Add Row Form...."
            fetch(`http://127.0.0.1:8000/time-entries?clientAll=1`).then(response => {
                response.json().then((res) => {
                    let selectOption = ""
                    res.forEach((value) => {
                        selectOption += `<option value='${value.id}'>${value.name}</option>`;
                    })
                    newform.innerHTML = `<h1 class="text-md border-b-4 my-8 p-4">New Row</h1>
                             <form action='{{ route('time-entries.store') }}' class="flex" id="form" method='POST'>
                                <div class="input-field">
                                    <x-label>Client</x-label>
                                    <select name="client_id" id="clients_list" onchange="getProjects(this)" class="rounded-md shadow-sm border-gray-300 m-2 focus:border-indigo-300 w-64 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        ${selectOption}
                                    </select>
                                    <div class="error">
                                        @error('address')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            <div class="input-field">
                                <x-label>project</x-label>
                                <select name="client_id" id="project_list" onchange="getTask(this)"  class="rounded-md shadow-sm border-gray-300 m-2 focus:border-indigo-300 w-64 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option>Select project..</option>
                                    <option>new project</option>
	                            </select>

                                <div class="error">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            {{-- slect task name --}}
                            <div class="input-field">
                                <x-label>Task</x-label>
                                <select name="client_id" id="task_list" class="rounded-md shadow-sm border-gray-300 m-2 focus:border-indigo-300 w-64 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
                                <x-input type="number" id="duration" name="duration" placeholder="duration"></x-input>
                                <div class="error">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <button type='submit'>save</button>
                        </form>`;
                    addrow.appendChild(newform)
                    document.getElementById('msg').innerHTML = ""
                })
            })
         }


         $(document).ready(function() {
             var currentDate = new Date();
             $('.disableFuturedate').datepicker({
                 format: 'yyy-mm-dd',
                 autoclose: true,
                 endDate: "currentDate",
                 maxDate: currentDate
             }).on('changeDate', function(ev) {
                 $(this).datepicker('hide');
             });
             $('.disableFuturedate').keyup(function() {
                 if (this.value.match(/[^0-9]/g)) {
                     this.value = this.value.replace(/[^0-9^-]/g, '');
                 }
             });
         });
     </script>

     <script>
         function getProjects(obj) {
             let clientId = obj.value;
             let project_option = obj.parentNode.nextElementSibling.childNodes[3];
             fetch(`http://127.0.0.1:8000/time-entries?client=${clientId}`).then(response => {
                     response.json().then((res) => {
                        project_option.innerHTML = "";

                        // enable all diabled select input
                        var form  = project_option.parentNode.parentNode;
                        var allElements = form.elements;
                        for (var i = 0, l = allElements.length; i < l; ++i) {
                            allElements[i].disabled=false;
                        }

                        res.forEach((value) => {
                            project_option.innerHTML +=
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
             let project_option = obj.parentNode.nextElementSibling.childNodes[3];
             fetch(`http://127.0.0.1:8000/time-entries?project=${projectId}`).then(response => {
                     response.json().then((res) => {
                        project_option.innerHTML = "";
                         res.forEach((value) => {
                            project_option.innerHTML +=
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
