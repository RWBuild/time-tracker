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
  <div>
    <p>{{ $client->name }} {{ $client->code }}</p>

    @if (Auth::User()->isAdmin() ||  Auth::User()->isOwner())

    <button   > <a href="/clients/{{$client->id }}/edit" >edit</a></button>
    @endif
    <button   > <a href="/clients/{{$client->id }}">view</a></button>

  </div>
     
      

  @empty
      <p>No clients in the database.</p>
     

  @endforelse

  @if (Auth::User()->isAdmin() ||  Auth::User()->isOwner())
  
  <button   > <a href="/clients/create" >add clients</a></button>
  
  @endif
  
</body>
</html>