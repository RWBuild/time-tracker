@extends('layouts.main')



@section('content')
    <div class="form_page">
        <form action="{{ route('clients.store') }}" method="POST">
            <h1>Add client</h1>
            @csrf
            <input type="text" placeholder="Fullname" name="name" />
            @error('name')
                <span class="message-color">
                    {{ $message }}
                </span>
            @enderror
            <input type="text" placeholder="Add Code" name="code" />
            @error('code')
                <span class="message-color">
                    {{ $message }}
                </span>
            @enderror
            <input type="text" placeholder="Address" name="address" />
            @error('address')
                <span class="message-color">
                    {{ $message }}
                </span>
            @enderror
            <input type="text" placeholder="Phone Number" name="phone" />
            @error('phone')
                <span class="message-color">
                    {{ $message }}
                </span>
            @enderror

            <button type="submit"> Submit</button>
        </form>
    </div>
@endsection
