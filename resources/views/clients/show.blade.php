<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client: {{ $client->name }}}</title>
</head>
<body>

<div>
<p>Name: {{ $client->name }}</p>
<p>code: {{ $client->code }}</p>

<p> {{ $client->phone }}</p>
<p> {{ $client->address }}</p>


</div>

</body>
</html>