<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  @forelse ($clients as $client)
      <p>{{ $client->name }} {{ $client->code }}</p>
  @empty
      <p>No clients in the database.</p>
  @endforelse
  
</body>
</html>