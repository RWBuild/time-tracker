<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Client Edit:{{ $client->name }}</title>
</head>
<body>
  @extends('layouts.navbar')

  @section('content')
    <div class="center">
        <h1>Edit a Client</h1>
        <form action="{{ route('clients.update',$client->id)}}" method="post">
          @csrf
          @method('put')
            <div class="txt_field">
              <label for="name">Name:</label>
                <input type="text" name="name" value="{{ $client->name }}" required>
            </div>
            <div class="txt_field">
              <label for="phone">Phone:</label>
                <input type="text" name="phone"  value="{{ $client->phone }}" required>
            </div>
            <div class="txt_field">
              <label for="code">Code:</label>
                <input type="text" value="{{ $client->code }}" required name="code">
            </div>
            <div class="txt_field">
              <label for="Address">Address:</label>
                <textarea name="address" id="" cols="55" rows="3">{{ $client->address }}</textarea>
            </div>
            <div class="txt_field">
                <input type="submit" value="Add">
            </div>
        </form>
    </div>
    @endsection

</body>
</html>