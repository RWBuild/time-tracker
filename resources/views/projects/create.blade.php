@extends('layouts.main')



@section('content')
    <div class="form_page">
        <form action="{{ route('clients.store') }}" method="POST">
            <h1>Add Project</h1>
            @csrf
            <input type="text" placeholder="Fullname" name="name" />
            @error('name')
                <span class="message-color">
                    {{ $message }}
                </span>
            @enderror
            <input type="text" placeholder="Budget" name="Budget" />
            @error('code')
                <span class="message-color">
                    {{ $message }}
                </span>
            @enderror
            <textarea placeholder="Decription" name="decription"></textarea>
            @error('description')
                <span class="message-color">
                    {{ $message }}
                </span>
            @enderror
            {{-- <select name="person_id" id="person_id">
              @foreach ($clients as $person)
                  <option value="{{ $client->id }}">

                      {{ $client->name }} 
                  </option>
              @endforeach
          </select> --}}

            <button type="submit"> Submit</button>
        </form>
    </div>
@endsection