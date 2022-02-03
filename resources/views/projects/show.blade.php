@extends('layout.app')


@section('content')
    <div class=" bg-gray-100 flex  justify-center items-center min-h-screen">
        <div class=" bg-white p-4 flex shadow-lg ">

            {{-- clients details --}}

            <div class=" flex flex-col justify-center items-center">

                <div class="p-2 ">
                    @include('common.alert')
                    <div class="border-b-4 px-32 m-2 border-gray-700 p-4 text-center uppercase">
                        <p class="font-semibold text-xl">Project: {{ $project->name }}</p>

                    </div>
                    <div class="m-2 text-center">
                        <div class="">
                            <div class="flex  my-4">
                                <p> <strong>Client :</strong> {{ $project->client->name }}</p>
                                <p class="ml-8"><strong>Budget :</strong> ${{ $project->budget }}</p>
                            </div>
                            <div class="flex justify-items-start my-4">
                                <p> <strong>description :</strong> {{ $project->description }}</p>
                            </div>
                        </div>


                        @php
                            $total_duration = 0;
                        @endphp
                        <table class="w-tablewidth">
                            <caption class="font-semibold mb-4"> Time Entry: </caption>

                            <tr class="border-b-2">

                                <th>Date</th>
                                <th>Person</th>
                                <th>Task</th>
                                <th>Duration</th>
                            </tr>
                            @forelse ($project->timeEntries as $timeEntry )
                                @php
                                    $total_duration = $total_duration + $timeEntry->duration;
                                @endphp


                                <tr class="border-b-2">
                                    <td>{{ $timeEntry->date }}</td>

                                    <td>{{ $timeEntry->user->name }}</td>

                                    <td>{{ $timeEntry->task->name }}</td>

                                    <td>{{ floor($timeEntry->duration / 60) . ':' . ($timeEntry->duration - floor($timeEntry->duration / 60) * 60) }}
                                    </td>
                                </tr>

                            @empty
                                no timeEntries
                            @endforelse
                        </table>

                        <div class="m-4 float-right mr-14">
                            <strong>Total Duration: </strong>
                            @php
                                $total_hour = floor($total_duration / 60) . ':' . ($total_duration - floor($total_duration / 60) * 60);

                                echo $total_hour;

                            @endphp

                        </div>


                        @empty
                                        <div class="bg-white p-10 text-center">
                                                        <p class="bg-red-100">No Time Entry</p>
                                        </div>
                        @endforelse
                        </table>
                    </div>
                </div>


            </div>
            {{--  --}}















        </div>

    </div>

@endsection
