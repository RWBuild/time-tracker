@extends('layouts.main')



@section('content')
    <div class="form_page">
        <form action="{{ route('projects.store') }}" method="POST">
            <h1>Add Project</h1>
            @csrf
            <select name="client_id">
                <option value="">--- Select client ---</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">

                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
            <input type="text" placeholder="Projectname" name="name" />
            @error('name')
                <span class="message-color">
                    {{ $message }}
                </span>
            @enderror
            <input type="text" placeholder="Budget" name="budget" />
            @error('budget')
                <span class="message-color">
                    {{ $message }}
                </span>
            @enderror
            <textarea placeholder="Decription" name="description"></textarea>
            @error('description')
                <span class="message-color">
                    {{ $message }}
                </span>
            @enderror


            <button type="submit"> Submit</button>
        </form>
    </div>
@endsection
