<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Of all Project</title>
</head>
<body>

    @forelse ($projects as $project)
    <div>
        <p> Project Name: {{$project->name}}</p>
        <p> Project Description: {{$project->description}}</p>

        <p> Project Budget: {{$project->budget}}</p>
        <p> Project Owner: {{$project->client->name}}</p>
    </div>
    @empty
    <p>no Clients in the database</p>
    @endforelse
</body>
</html>
