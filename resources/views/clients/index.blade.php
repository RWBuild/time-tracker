<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>

  {{-- @foreach ($clients as $client) --}}
  
      {{-- <p>{{ $client->name }} {{ $client->code }}</p> --}}
      <div class="content-children">
      <h2> List of Clients</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Code</th>
                <th>adress</th>
   

            <tr>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>
                                {{ $client->id }}
                            </td>
                            <td>
                                {{ $client->name }}
                            </td>

                            <td>
                                {{ $client->code}}
                            </td>

                            <td>
                                {{ $client->address}}
                            </td>
                            <td class="action">
                                <a href="/clients/{{ $client->id }}" class="action-view">view</a>

                                <form method="POST" action="">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="">Edit</button>
                                </form>
                            </td>
                        </tr>
                </tbody>
                





                @endforeach
                <button><a href="/clients/create">Add Clients</a></button>


        </table>
      </div>

  {{-- @empty
      <p>No clients in the database.</p> --}}

  {{-- @endforelse --}}
  
</body>
</html>