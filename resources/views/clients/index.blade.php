

@extends('layout.app')


@section('content')


<h1 class="font-bold text-4xl text-center text-gray-700 bg-gray-100 m-3 p-4">Clients</h1>

<div class="   flex  flex-wrap justify-center items-center ">

 


    
  @forelse ($clients as $client)

{{--  --}}

<div class="card ">
          
  <div class="my-2 ">
      <h3 class="font-bold"> name:{{ $client->name }} </h3>
  

      <p class="m-1"> code:{{ $client->code }}</p>

      <p class="m-2"> Phone:+250 {{$client->phone }}</p>
    
      

  </div>
  <div class="  flex justify-between  ">
    @if (Auth::User()->isAdmin() ||  Auth::User()->isOwner())

    <button class="btn-card" > <a href="/clients/{{$client->id }}/edit" class="" >edit</a></button>
    @endif
  
    <button class="btn-card" > <a href="/clients/{{$client->id }}">view</a></button>
 
    
  </div>


</div>


 
  @empty

      <p>No clients in the database.</p>
     

  @endforelse

  
  

</div>
<div class="flex justify-center items-center">

  @if (Auth::User()->isAdmin() ||  Auth::User()->isOwner())
  
  <button  class="button"  > <a href="/clients/create" class="">add clients</a></button>
  
  @endif

</div>



@endsection


