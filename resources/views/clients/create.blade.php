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
        <input type="text" placeholder="Add Name" name="name" />
        @error('name')
            <div class="message-color">
                {{ $message }}
            </div>
        @enderror
        <input type="text" placeholder="Add Code" name="code" />
        @error('code')
            <div class="message-color">
                {{ $message }}
            </div>
        @enderror
        <input type="text" placeholder="Add Address" name="address" />
        @error('address')
            <div class="message-color">
                {{ $message }}
            </div>
        @enderror
        <input type="text" placeholder="Phone Number" name="phone" />
        @error('phone')
            <div class="message-color">
                {{ $message }}
            </div>
        @enderror


        <button type="submit"> Submit</button>




    </form>

</body>

</html>
