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
  {{-- <h2>Edit {{ $client->name }}</h2>
<p>Name: {{ $client->name }}</p>
<p>Code: {{ $client->code }}</p>

<p>{{ $client->phone }}</p>
<p>{{ $client->address }}</p> --}}

<p>This is my form</p>
  <form action="{{ route('clients.update', $client->id) }}" method="POST">
    @csrf
    @method('put')

    
      <div class="input-field">
       
        <input type="text" id="name" name="name"  value="{{ $client->name }}">
        <div class="error">
            @error('name')
            {{ $message }}
        @enderror
        </div>
      
  
        
    </div>
  
    
    <div class="input-field">
       
        <input type="text" id="email" name="code" value="{{ $client->code }}">
        <div class="error">
            @error('code')
            {{ $message }}
        @enderror
        </div>
     
        
    </div>
    <div class="input-field">
        
        <input type="text" id="address" name="address" value="{{ $client->address }}">
        <div class="error">
            @error('address')
            {{ $message }}
        @enderror
  
        </div>
      
        
    </div>
    
  
  <div class="input-field">
        
    <input type="number" id="address" name="phone" value="{{ $client->phone }}">
    <div class="error">
        @error('phone')
        {{ $message }}
    @enderror
  
    </div>
  
    
  </div>
  
  
    <div >
        <button type="submit" class="" >submit</button>
    </div>
  
  
      
  

  </form>

</div>

</body>
</html>