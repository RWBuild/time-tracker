@extends('layouts.main')
@section('content')


    <h2> List of Clients</h2>
    <div class="clients_container">
        <table>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Code</th>
                <th>adress</th>
                <th></th>
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
                            <td class="action">
                                <a href="/clients/{{ $client->id }}" class="action-view">view</a>
                                <a href= "/clients/{{ $client->id }}/edit" class="action-view">Edit</a>

                                {{-- <form method="POST" action="">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="{{ route('clients.edit', $client->id) }}">Edit</button>
                                </form> --}}
                            </td>
                        </tr>
                </tbody>
                @endforeach
        </table>
    </div>
    <button><a href="/clients/create">Add Clients</a></button>
@endsection
