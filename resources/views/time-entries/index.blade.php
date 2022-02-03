<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>


    @extends('layouts.navbar')

    @section('content')

        <div class="time_container" id="entry_container">
            <div class="info_container">
                <div class="icon">
                  <i class="fa fa-user-circle"></i>

                  <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
              <x-dropdown align="right" width="48">
                  <x-slot name="trigger">
                      <button class="flex items-center text-sm font-bold text-black-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        <div>{{ Auth::user()->name }}</div>

                          <div class="ml-1">
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                              </svg>
                          </div>
                      </button>
                  </x-slot>

                  <x-slot name="content">
                      <!-- Authentication -->
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf

                          <x-dropdown-link :href="route('logout')"
                                  onclick="event.preventDefault();
                                              this.closest('form').submit();">
                              {{ __('Log Out') }}
                          </x-dropdown-link>
                      </form>
                  </x-slot>
              </x-dropdown>
          </div>
                 </div>
                
            </div>
            <form>
                <div>
                    <input type="date" name="date" value="<?php echo date('Y-m-d');?>" id="date-input">
                </div>
            <div class="row_container">
               
                <div class="select_field">
                    <label for="company_name">company Name:</label>
                    <select>
                        @forelse ($clients as $client)
                        <option>{{ $client->name  }}</option>
                        @empty
                        <p>No Client</p>
                        @endforelse
                       
                    </select>
                </div>
                <div class="select_field">
                    <label for="project_name">project Name:</label>
                    <select id="project">
                        <option>project</option>
                    </select>
                </div>

                <div class="select_field">
                    <label for="task">Task:</label>
                    <select id="task">
                        <option>task</option>
                    </select>
                </div>

                <div class="select_field">
                    <label for="time">time:</label>
                    <input  id="duration"type="text">
                </div>
                <div class="select_field">
                    <label for="time"></label>
                    <button type="submit" id="submit" onclick="getDate()">Save</button>
                </div>
            </div>
            </form>
            {{-- <div id="form-container"></div> --}}
        </div>
        
        <div class="row_button"><button onclick="getContainer()">Add row</button></div>
    @endsection
    {{-- @forelse ($timeEntries as $timeEntry)
        <p>{{ $timeEntry->project->name }} {{ $timeEntry->duration }}</p>
    @empty
        <p>No time entries for this date.</p>
    @endforelse --}}
<script src="{{url('/js/time_entry.js')}}"></script>

</body>

</html>
