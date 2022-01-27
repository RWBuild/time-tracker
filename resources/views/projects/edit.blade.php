<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <h2>Edit a project</h2>
    <p>Name: {{$project->name}}</p>
    <p>client: {{$project->client_id}}</p>
    <p>Budget: {{$project->budget}}</p>
    <p>Description: {{$project->description}}</p>
</body>
</html>