<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  @foreach ($clients as $client)
  
      {{-- <p>{{ $client->name }} {{ $client->code }}</p> --}}
      <h2>Clients</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Action</th>

            <tr>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>
                                {{ $client->id }}
                            </td>
                            <td>
                                {{ $client->first_name }}
                            </td>

                            <td>
                                {{ $client->last_name }}
                            </td>

                            <td>
                                {{ $client->email }}
                            </td>
                            <td class="action">
                                <a href="/clients/{{ $client->id }}" class="action-view">view</a>

                                <form method="POST" action="">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="action-delete">Edit</button>
                                </form>
                            </td>
                        </tr>
                </tbody>





                @endforeach
        </table>

  @empty
      <p>No clients in the database.</p>

  {{-- @endforelse --}}
  
</body>
</html>