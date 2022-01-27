<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div> 
        <h1>User can see the project </h1>

        <p>Phone: {{$project->id}} </p>
        <p>Phone: {{$project->client_id}} </p>
        <p>Name: {{$project->name}} </p>
        <p>code: {{$project->description}} </p>
        
        
    </div>
</body>
</html>