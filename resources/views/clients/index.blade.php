@extends('layouts.main')


@section('content')

    <div class="clients_list">
        <h2 class="text-center text-3xl pt-5"> List of Clients</h2>
        @if (session('success'))
            @component('components.card')
                @slot('content')
                    <p class="text-green-600">{{ session('success') }}</p>
                @endslot
            @endcomponent
        @endif
        <div class="clients_table">
            <table>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Adress</th>
                    <th>Phone</th>
                    <th>View</th>
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::User()->isAdmin())
                                <th>Edit</th>
                            @endif
                        @endauth
                    @endif

                <tr>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>
                                    {{ $client->id }}
                                </td>
                                <td>
                                    {{ $client->name }}
                                </td>
                                <td>
                                    {{ $client->code }}
                                </td>
                                <td>
                                    {{ $client->address }}
                                </td>
                                <td>
                                    {{ $client->phone }}
                                </td>
                                <td class="flex">
                                    <a href="/clients/{{ $client->id }}" class="action-view">view</a>
                                </td>

                                @if (Route::has('login'))
                                    @auth
                                        @if (Auth::User()->isAdmin() || Auth::User()->isOwner())
                                            <td>
                                                <a href="/clients/{{ $client->id }}/edit">Edit</a>
                                            </td>
                                        @endif
                                    @endauth
                                @endif
                            </tr>
                    </tbody>
                    @endforeach
            </table>
        </div>
        @if (Auth::User()->isAdmin())
            <a class="add_client" href="/clients/create">Add Clients</a>
        @endif

    </div>
@endsection
