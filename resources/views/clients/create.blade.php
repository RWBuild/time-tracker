@extends('layout.app')


@section('content')
<div class=" bg-gray-100 flex flex-col justify-center items-center min-h-screen">
       
  <header class="font-bold text-4xl text-center text-gray-700 m-2"> Add Clients </header>
 





  <form action="{{ route('clients.store') }}" method="POST">
    @csrf
    <div class="input-field">
     
      {{-- <input type="text" id="name" name="name"  placeholder="fullname"> --}}

      <x-input type="text" name='name'  placeholder="fullname"/>

      <div class="error">
          @error('name')
          {{ $message }}
      @enderror
      </div>
    

      
  </div>

  
  <div class="input-field">
    <x-input type="text" name='code' placeholder="email" />
     
    
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


  <div class="flex justify-center" >
      <x-button type="submit"  >submit</x-button>
  </div>


    
  </form>

</div>

  @endsection