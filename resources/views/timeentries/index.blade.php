<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index page</title>
</head>
<body>
    <div>
        @forelse ($timeentries as $timeentry)
            <p>{{ $timeentry->duration }} {{ $timeentry->duration }}</p>
        @empty
            <p>No timeentry in the database.</p>
        @endforelse
    </div>
</body>
</html>