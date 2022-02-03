@extends('layouts.main')

@section('content')

    <div class="flex justify-center items-center w-11/12 mx-auto">
        <div class="mt-10 mr-10">
            <h1 class="text-2xl border mb-5">Project information</h1>
            <p><b>Project name: </b>{{ $project->name }}</p>
            <p><b>Client: </b>{{ $project->client->name }}</p>
            <p><b>Budget: </b>{{ $project->budget }}Rwf</p>
            <p><b>Description: </b>{{ $project->description }}</p>
        </div>

        <table class="mt-10 ml-10">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Person</th>
                    <th>Task</th>
                    <th>Duration</th>
                </tr>
            </thead>
            @php
                $totalDuration = 0;
            @endphp
            @forelse ($project->timeEntries as $entry)
                @php
                    $totalDuration = $totalDuration + $entry->duration;
                @endphp
                <tr>
                    <td>{{ $entry->date }}</td>
                    <td>{{ $entry->user->name }}</td>
                    <td>{{ $entry->task->name }}</td>
                    <td>{{ intdiv($entry->duration, 60) . ':' . $entry->duration % 60 }}</td>
                </tr>
            @empty
                <p>No company saved yet</p>
            @endforelse
            <tr>
                <td colspan="4">

                    <p class="text-center">
                        Total duration: {{ intdiv($totalDuration, 60) . ':' . $totalDuration % 60 }}
                    </p>
                </td>
            </tr>
        </table>
    </div>
    {{-- <div class="flex justify-center items-center w-11/12 mx-auto">
        @forelse ($project->timeEntries as $entry)
            @component('components.card')
                @slot('content')
                    <p>{{ $entry->user->name }}</p>
                    <p>{{ $entry->duration }}</p>
                @endslot
            @endcomponent
        @empty
            <p>No company saved yet</p>
        @endforelse
    </div> --}}
@endsection
