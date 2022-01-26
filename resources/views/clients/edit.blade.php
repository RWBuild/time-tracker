<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client: {{$client->name}}</title>
</head>
<body>

    <div>
        <h2>Edit {{$client->name}}</h2>
        <p> Client Name: {{$client->name}}</p>
        <p> Client code: {{$client->code}}</p>

        <p> Client phone: {{$client->phone}}</p>
        <p> Client address: {{$client->address}}</p>


</body>
</html>
