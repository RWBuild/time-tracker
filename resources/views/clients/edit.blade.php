
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit client {{$client->name}} / laravel</title>
</head>
<body>
    <div class="clientname wrapper">
        <p><strong>Name: </strong> {{$client->name}}</p>
        <p><strong>Code: </strong> {{$client->code}}</p>

        <p><strong>phone: </strong> {{$client->phone}}</p>
        <p><strong>address: </strong> {{$client->address}}</p>
    </div>
</body>
</html>