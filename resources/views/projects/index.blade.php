@extends('layouts.main')


@section('content')
    <h2 class="text-center text-3xl pt-5"> List of Projects</h2>
    @if (session('success'))
        @component('components.card')
            @slot('content')
                <p class="text-green-600">{{ session('success') }}</p>
            @endslot
        @endcomponent
    @endif
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
                                    <a class="text-blue-600" href="/projects/{{ $project->id }}">View</a>
                                    @if (Auth::User()->isAdmin() || Auth::User()->isOwner())
                                        <a class="text-blue-600" href="/projects/{{ $project->id }}/edit">Edit</a>

                                    @endif
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
