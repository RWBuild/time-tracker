



@extends('layout.app')


@section('content')
<div class=" bg-gray-100 flex  justify-center items-center min-h-screen">
       
  
  
  <div class=" bg-white p-4 flex shadow-lg ">
 

  {{-- clients details --}}



  <div class=" flex flex-col justify-center items-center">
       
    <div class="p-2 ">

    
      <div class="border-b-4 px-32 m-2 border-gray-700 p-4">
    <p class="font-semibold">project: {{ $project->name }}</p>

      </div>
    <div class="m-2 text-center">
      <p>{{ $project->client->name }}</p>
      <p>{{ $project->budget }}</p>
    <p>{{ $project->description }}</p>

    <table>
      <caption class="font-semibold"> Time Entry: </caption>

      <tr> 
  
        <th>Date</th>
        <th>Person</th>
        <th>Task</th>
        <th>Duration</th>
      </tr>
      <tr> 
        <td>amata</td>
        <td>amagi</td>
        <td>benjamin yayariye</td>
        <td>umutobe</td>
        </tr>
  </table>


  @forelse ($project->timeEntries as $timeEntry ) 
      



  <p>{{ $timeEntry->name }}</p>
  <p>{{ $timeEntry->user->name }}</p>

  @empty
      no timeEntries hhhh
  @endforelse

    
 

    
</div>
</div>


</div>
  {{--  --}}















</div>

</div>

@endsection