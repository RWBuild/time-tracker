


@extends('layout.app')


@section('content')  
<div class=" bg-gray-100 flex flex-col justify-center items-center min-h-screen">
       
  <header class="font-bold text-4xl text-center text-gray-700 m-2"> Edit Project:{{ $project->name }} </header>
  <form action="" method="POST">
    @csrf
    @method('put')

    
      <div class="input-field">
       
        <input type="number" id="clientid" name="number"  value="{{ $project->client_id }}">

        <div class="error">
            @error('number')
            {{ $message }}
        @enderror
        </div>
      
  
        
    </div>
  
    
    <div class="input-field">
       
        <input type="text" id="budget" name="budget" value="{{ $project->budget }}">
        <div class="error">
            @error('budget')
            {{ $message }}
        @enderror
        </div>
     
        
    </div>
    <div class="input-field">
        
      
        <div class="error">
            @error('address')
            {{ $message }}
        @enderror
  
        </div>
      
        
    </div>
    
  
  <div class="input-field">
        
    <input type="text" id="description" name="description" value="{{ $project->description }}">
    <div class="error">
        @error('description')
        {{ $message }}
    @enderror
  
    </div>
  
    
  </div>
  
  
  <div class="flex justify-center" >
    <button type="submit" class="button"  >Edit</button>
</div>
  
  
      
  

  </form>

</div>

@endsection

    