@extends('layouts.main')


@section('content')
    <h2 class="text-center text-3xl pt-5"> List of Projects</h2>
    @if (session('success'))
        <div class="flex justify-center flex-wrap w-11/12 mx-auto">
            @component('components.card')
                @slot('content')
                    <p class="text-green-600">{{ session('success') }}</p>
                @endslot
            @endcomponent
        </div>
    @endif
    <div class="flex flex-wrap w-11/12 mx-auto">
        <div class="projects_header">
            <div>
                <h2 class="text-xl">Clients</h2>
            </div>
            <div>
                <h2 class="text-xl">Projects</h2>
            </div>
        </div>
        @forelse ($clients as $client)
            <div class="projects">
                <div>
                    {{-- <h2 class="text-xl">Client</h2> --}}
                    <p>{{ $client->name }}</p>
                </div>
                <div>
                    {{-- <h2 class="text-xl">Projects</h2> --}}
                    <table>
                        @forelse ($client->projects as $project)
                            <tr class="border-none">
                                <td class="w-2/3">
                                    <p>{{ $project->name }} {{ $project->budget }}Rwf</p>
                                </td>
                                <td>
                                    <a class="text-blue-600 mr-2" href="/projects/{{ $project->id }}">View</a>
                                    @if (Auth::User()->isAdmin() || Auth::User()->isOwner())
                                        <a class="text-blue-600" href="/projects/{{ $project->id }}/edit">Edit</a>

                                    @endif
                                </td>
                            </tr>
                        @empty
                            <p>No projects in the database.</p>
                        @endforelse
                    </table>
                </div>
                @if (Auth::User()->isAdmin() || Auth::User()->isOwner())
                    <div>
                        <a href="/projects/create">Add project</a>
                    </div>
                @endif
            </div>
        @empty
            <p>No company saved yet</p>
        @endforelse
    </div>
@endsection
