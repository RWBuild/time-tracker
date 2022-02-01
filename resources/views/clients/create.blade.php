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
    <div class="input-field">
     
      <input type="text" id="name" name="name"  placeholder="fullname">
      <div class="error">
          @error('name')
          {{ $message }}
      @enderror
      </div>
    

      
  </div>

  
  <div class="input-field">
     
      <input type="text" id="email" name="code" placeholder="Email">
      <div class="error">
          @error('code')
          {{ $message }}
      @enderror
      </div>
   
      
  </div>
  <div class="input-field">
      
      <input type="text" id="address" name="address" placeholder="address">
      <div class="error">
          @error('address')
          {{ $message }}
      @enderror

      </div>
    
      
  </div>
  

<div class="input-field">
      
  <input type="number" id="address" name="phone" placeholder="phone">
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

</body>
</html>