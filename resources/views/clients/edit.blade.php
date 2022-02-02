
@extends('layout.app')


@section('content')  
<div class=" bg-gray-100 flex flex-col justify-center items-center min-h-screen">
       
  <header class="font-bold text-4xl text-center text-gray-700 m-2"> Edit Clients </header>

  <form action="{{ route('clients.update', $client->id) }}" method="POST">
    
    @csrf
    @method('put')

    
      <div class="input-field">
        <x-label>name</x-label>
        <input type="text" id="name" name="name"  value="{{ $client->name }}">
        <div class="error">
            @error('name')
            {{ $message }}
        @enderror
        </div>
      
  
        
    </div>
  
    
    <div class="input-field">
       <x-label>code</x-label>
        <input type="text" id="email" name="code" value="{{ $client->code }}">
        <div class="error">
            @error('code')
            {{ $message }}
        @enderror
        </div>
     
        
    </div>
    <div class="input-field">
      <x-label>address</x-label>
        <input type="text" id="address" name="address" value="{{ $client->address }}">
        <div class="error">
            @error('address')
            {{ $message }}
        @enderror
  
        </div>
      
        
    </div>
    
  
  <div class="input-field">
    <x-label>phone</x-label>
    <input type="number" id="address" name="phone" value="{{ $client->phone }}">
    <div class="error">
        @error('phone')
        {{ $message }}
    @enderror
  
    </div>
  
    
  </div>
  
  
  <div class="flex justify-center" >
    <button type="submit"  onclick="return confirm('confirm edit')" class="inline-flex items-center m-2 px-4 py-2 bg-gray-700 border 
    border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 active:bg-gray-900 
    focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" >Edit client</button>
</div>
  
  
      
  

  </form>

</div>

@endsection