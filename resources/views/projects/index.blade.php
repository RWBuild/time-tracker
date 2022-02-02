@extends('layouts.main')


@section('content')
    <div class="flex flex-wrap w-11/12 mx-auto">
        @forelse ($clients as $client)
            @component('components.card')
                @slot('content')
                    <h2 class="text-xl">Client</h2>
                    <hr>
                    <p>{{ $client->name }}</p>
                    <h2 class="text-xl mt-5">Projects</h2>
                    <hr>
                    <table>
                        @forelse ($client->projects as $project)
                            <tr class="border-none">
                                <td>
                                    <p>{{ $project->name }} {{ $project->budget }}</p>
                                </td>
                                <td>
                                    <a class="ml-5 text-blue-600" href="/projects/{{ $project->id }}">View</a>
                                </td>
                            </tr>
                        @empty
                            <p>No projects in the database.</p>
                        @endforelse
                    </table>
                    <a class="text-blue-600" href="/projects/create">Add project</a>
                @endslot
            @endcomponent
            @empty
                <p>No company saved yet</p>
            @endforelse
        </div>
    @endsection
