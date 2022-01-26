<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project: {{$project->name}}</title>
</head>
<body>

    <div>
        <h2>Edit {{$project->name}}</h2>
        <p> Project Name: {{$project->name}}</p>
        <p> Project Description: {{$project->description}}</p>

        <p> Project Budget: {{$project->budget}}</p>
        <p> Project Owner: {{$project->client->name}}</p>
    </div>


</body>
</html>
