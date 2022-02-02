@extends('layouts.main')
@section('content')

    <div>
        {{-- <h2>Edit {{ $client->name }}</h2>
        <p>Name: {{ $client->name }}</p>
        <p>Code: {{ $client->code }}</p>

        <p>{{ $client->phone }}</p>
        <p>{{ $client->address }}</p> --}}

        <div class="edit_client">
            <h2>Edit {{$client->name}} Information</h2>
            <form action="{{ route('clients.update', $client->id) }}" method="POST">
                <div class="all_form">
                    @csrf
                    @method('PUT')
                    
                    <input type="text" name="name" value="{{ $client->name }}" class="form-control">
                    <input type="text" name="code" value="{{ $client->code }}" class="form-control">
                    <input type="text" name="address" value="{{ $client->address }}" class="form-control">

                    <input type="tel" name="phone" value="{{ $client->phone }}" class="form-control">
                    <button type="submit">Submit</button>



                </div>
            </form>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
            @endif


        </div>

    @endsection
