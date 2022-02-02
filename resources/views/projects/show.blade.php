



@extends('layout.app')


@section('content')
<div class=" bg-gray-100 flex  justify-center items-center min-h-screen">
       
  
  
  <div class=" bg-white p-4 flex shadow-lg ">
 

  {{-- clients details --}}



  <div class=" flex flex-col justify-center items-center">
       
    <div class="p-2 ">

    
      <div class="border-b-4 px-32 m-2 border-gray-700 p-4">
    <p class="font-semibold">project: {{ $project->name }}</p>
    {{-- <p>Client: {{ $project->client_id }}</p> --}}
      </div>
    <div class="m-2 text-center">

      <p>{{ $project->budget }}</p>
    <p>{{ $project->description }}</p>
 

    
</div>
</div>


</div>
  {{--  --}}















</div>

</div>

@endsection