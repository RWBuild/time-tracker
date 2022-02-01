<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Create Client</title>
</head>
<body>

  <p>This is my form</p>
  <form action="{{ route('clients.store') }}" method="POST">
    @csrf


  </form>

</body>
</html>