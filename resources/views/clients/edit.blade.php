<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Client Edit: {{ $client->name }}</title>
</head>
<body>
  
<div>
  <h2>Edit {{ $client->name }}</h2>
<p>Name: {{ $client->name }}</p>
<p>Code: {{ $client->code }}</p>

<p>{{ $client->phone }}</p>
<p>{{ $client->address }}</p>

</div>

</body>
</html>