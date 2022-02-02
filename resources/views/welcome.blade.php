<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Time tracker</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
</head>

<body class="antialiased">

    @extends('layouts.navbar')

    @section('content')
    <div class="flex flex-nowrap">
        <div>
            <img src="{{URL::to('/assets/img/img1.png')}}" alt="img" class="w-9/12 px-10">
        </div>
        <div class="intro-text">
            <h1>Time Tracking</h1>
            <p><q>Plan better with us!!</q></p>
        </div>
    </div>
    
        

    @endsection
</body>

</html>
