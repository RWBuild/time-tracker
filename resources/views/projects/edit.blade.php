<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit {{$projects->name}}</title>
</head>
<body>
    <div class="project">
        <p><strong>Name => </strong>{{$projects->name}}</p>
        <p><strong>Description => </strong>{{$projects->description}}</p>
        <p><strong>Budget => </strong>{{$projects->budget}}</p>
    </div>
</body>
</html>
