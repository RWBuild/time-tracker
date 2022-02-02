@extends('layouts.main')
@section('content')
    

<div class="create_client">
    <h2>Add a Client to Database</h2>
    <form action="{{ route('clients.store') }}" method="POST">
        
            @csrf
            <div class="all_form">
            <input type="text" placeholder="Add Name" name="name" />
            @error('name')
                <div class="message-color">
                    {{ $message }}
                </div>
            @enderror
            <input type="text" placeholder="Add Code" name="code" />
            @error('code')
                <div class="message-color">
                    {{ $message }}
                </div>
            @enderror
            <input type="text" placeholder="Add Address" name="address" />
            @error('address')
                <div class="message-color">
                    {{ $message }}
                </div>
            @enderror
            <input type="text" placeholder="Phone Number" name="phone" />
            @error('phone')
                <div class="message-color">
                    {{ $message }}
                </div>
            @enderror


            <button type="submit"> Submit</button>


        </div>

    </form>
</div>

    @endsection