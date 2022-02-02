@extends('layouts.main')



@section('content')
    <div class="form_page">

        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('put')
            <h1>Edit client</h1>
            <input type="text" placeholder="Add Name" name="name" value="{{ $client->name }}" />
            <span>
                @error('name')
                    {{ $message }}
                @enderror
            </span>
            <input type="text" placeholder="Add Code" name="code" value="{{ $client->code }}" />
            <span>
                @error('code')
                    {{ $message }}
                @enderror
            </span>
            <input type="text" placeholder="Add Address" name="address" value="{{ $client->address }}" />
            @error('address')
                <span>
                    {{ $message }}
                </span>
            @enderror
            <input type="text" placeholder="Phone Number" name="phone" value="{{ $client->phone }}" />
            <span>
                @error('phone')
                    {{ $message }}
                @enderror
            </span>

            <button type="submit"> Edit</button>
        </form>

    </div>
@endsection
