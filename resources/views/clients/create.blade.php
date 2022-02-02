<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!--css link-->
     <link rel="stylesheet" href={{ mix('css/app.css') }}>
    <title>Create Client</title>
</head>

<body>
  @extends('layouts.navbar')

  @section('content')
    <div class="center">
        <h1>Add a Client</h1>
        <form action="{{ route('clients.store')}}" method="post">
          @csrf
            <div class="txt_field">
                <input type="text" name="name" placeholder="Name.." required>
            </div>
            <div class="txt_field">
                <input type="text" name="phone" placeholder="Phone number..." required>
            </div>
            <div class="txt_field">
                <input type="text" name="code" placeholder="code.." required>
            </div>
            <div class="txt_field">
                <textarea name="address" id="" cols="55" rows="3" placeholder="Add your adress here.."></textarea>
            </div>
            <div class="txt_field">
                <input type="submit" value="Add">
            </div>
        </form>
    </div>
    @endsection
</body>

</html>
