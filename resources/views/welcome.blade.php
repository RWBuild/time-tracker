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
                <img src="{{ URL::to('/assets/img/img1.png') }}" alt="img" class="w-9/12 px-10">
            </div>
            <div class="intro-text">
                <h1>Time Tracking</h1>
                <p><q>Plan better with us!!</q></p>
            </div>
        </div>
        
        <div class="section-2">
            <div class="paragraph">
                <h1>Why plan?</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id natus corrupti pariatur eum
                    blanditiis
                    quibusdam aspernatur reiciendis, harum ad, beatae maiores autem molestias, ipsam provident ullam optio
                    odit quasi possimus.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus odit voluptatibus exercitationem? Dolor
                    facere, odit alias optio quis labore. Excepturi vero, atque maxime ab sapiente aliquam incidunt non
                    explicabo et!</p>
        </div>
            
            <img src="{{ URL::to('/assets/img/project-plan.png') }}" alt="img" class="image-2">
        </div>
    @endsection
</body>

</html>
