<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    @forelse ($project as $project)
      <p>{{$project->name}}</p>  
    @empty
        <p> No project</p>
    @endforelse
</body>
</html>