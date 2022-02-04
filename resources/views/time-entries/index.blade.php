@extends('layouts.main')

@section('page-title') Create Client @endsection

@section('content')
    @include('includes.main-nav')
    <div class="wrapper">
        <div class="card">
            @if (session('success'))
                <div class="alert bg-green-500 my-2">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex items-center space-x-2 mb-5">
                <form action="{{ route('searchByDate') }}" method="get">
                    <div class="flex items-center space-x-1">
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="date" name="date" class="datepicker" onchange="this.form.submit()"
                                max="{{ date_format(now(), 'Y-m-d') }}" value="@if (app('request')->input('date')){{ app('request')->input('date') }}@else{{ date_format(now(), 'Y-m-d') }}@endif">
                        </div>
                    </div>
                </form>

            </div>

            <div class="divide-y-4">

                @php
                    $i = 1;
                    $j = 1;
                @endphp

                @forelse ($timeEntries as $timeEntry)
                    <form action="{{ route('time-entries.update', $timeEntry) }}" method="post" class="pb-4">
                        @csrf
                        @method('put')
                        <div class="flex space-x-1 py-2">
                            <input type="hidden" name="date" value="@if (app('request')->input('date')){{ app('request')->input('date') }}@else{{ date_format(now(), 'Y-m-d') }}@endif">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="flex-1">
                                <label for="client">Clients</label>
                                <select name="client" id="client-{{ $i++ }}" class="form-input">
                                    @forelse ($clients as $client))
                                        <option @if ($client->id == $timeEntry->project->client->id)
                                            selected
                                    @endif

                                    value="{{ $client->id }}">{{ $client->name }}</option>
                                @empty
                                    <option>NO CLIENTS</option>
                @endforelse
                </select>
            </div>


            <div class="flex-1">
                <label for="project">Projects</label>
                <select name="project_id" id="project-{{ $j++ }}" class="form-input">
                    @forelse ($timeEntry->project->client->projects as $project)
                        <option @if ($project->id == $timeEntry->project_id)
                            selected
                    @endif
                    value="{{ $project->id }}">{{ $project->name }}</option>
                @empty
                    <option>no option</option>
                    @endforelse
                </select>
            </div>




        </div>
        <div class="flex items-center space-x-1">

            <div class="flex-1">
                <label for="task">Task</label>
                <select name="task_id" id="task" class="form-input">

                    @forelse ($tasks as $task)
                        <option @if ($task->id == $timeEntry->task_id)
                            selected
                    @endif
                    value="{{ $task->id }}" >{{ $task->name }}</option>
                @empty
                    <option>No Task</option>
                    @endforelse
                </select>
            </div>

            <div class="flex-1 pt-6">
                <input type="text" name="duration" placeholder="duration format(Hours:min)" class="form-input"
                    value="{{ intdiv($timeEntry->duration, 60) . ':' . $timeEntry->duration % 60 }}">
            </div>

        </div>
        <div class="pt-1">
            <button type="submit" class="btn btn-sm">change</button>
        </div>
        </form>
    @empty
        <p>No Time Entries</p>
        @endforelse

        <div class="forms-wrapper">
            <div id="msg"></div>
        </div>

        <div class="py-4">
            <button onclick="handleAddNewRow()" class="btn btn-sm">
                Add Row
            </button>
        </div>

    </div>

    </div>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        function handleAddNewRow() {
            const formsWrapper = document.querySelector('.forms-wrapper');
            const div = document.createElement('div');
            div.innerHTML = `
    <form action="{{ route('time-entries.store') }}" method="post" class="pb-4">
          @csrf
          <div class="flex space-x-2 py-2">
            <input type="hidden" name="date" 
                value="@if (app('request')->input('date')){{ app('request')->input('date') }}@else{{ date_format(now(), 'Y-m-d') }}@endif"
              >
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
              <select name="client" class="form-input">
                @forelse ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @empty
                    <option>No client</option>
                @endforelse
              </select>
              <select name="project_id" id="project-{{ $j++ }}" class="form-input">
                 @forelse ($projects as $project)
                     <option value="{{ $project->id }}">{{ $project->name }} ({{ $project->client->name }})</option>
                 @empty
                     <option>no option</option>
                 @endforelse
              </select>
          </div>
            <div class="flex space-x-2 items-start">
             <div class="flex-1">
              <select name="task_id" id="task" class="form-input">
                <option>--- select task ---</option>
                @forelse ($tasks as $task)
                    <option value="{{ $task->id }}">{{ $task->name }}</option>
                @empty
                    <option>No task</option>
                @endforelse
              </select>
             </div>
              <div class="flex space-x-1 flex-1">
                  <input type="text" name="duration" id="minutes" class="form-input" placeholder="MINUTES">
              </div>
            </div>
            <button class='btn btn-sm my-2'>save</button>
        </form>
    
    `;

            formsWrapper.appendChild(div);

        }
    </script>
    <script>
        for (let i = 1; i < parseInt(<?php echo $i; ?>); i++) {
            $(`#client-${i}`).on('change', function() {
                $.ajax({
                    type: 'GET',
                    url: `/time-entries/getClientsProjects/${this.value}`,
                    data: '_token = <?php echo csrf_token(); ?>',
                    success: function(data) {
                        let projects = '';
                        data.forEach(client => {
                            projects +=
                                `<option value='${client.id}'> ${client.name} </option>`;
                        });
                        $(`#project-${i}`).html(projects);
                    }
                });
            });
        }
    </script>

@endsection
