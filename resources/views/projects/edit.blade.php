@extends('layouts.main')
@section('page-title') Project : {{ $project->name }}@endsection

@section('content')
@include('includes.main-nav')
<div class="wrapper">
  <div class="card">
    <div class="mb-2">
      <h3 class="text-2xl font-bold text-primary">Edit Project,</h3>
      <p>fill out form fields</p>
     </div>
     <div class="py-1">
      <x-auth-validation-errors class="mb-4" :errors="$errors" />
     </div>
     <form action="{{ route('projects.update',$project) }}" method="post">
        @csrf
        @method('put')
        <div class="py-2">
          <x-label>Client *</x-label>
          <select name="client_id" class="form-input">
            <option disabled>-- select clients --</option>
            @forelse ($clients as $client)
                <option value="{{ $client->id }}" 
                  @if ($client->id == $project->client_id)
                      selected
                  @endif
                  
                  >{{ $client->name }}</option>
            @empty
                <option disabled>no clients</option>
            @endforelse
          </select>
      </div>
      <div class="py-2">
        <x-label>Name *</x-label>
        <x-main-input name='name' type='text' placeholder='Name...' value='{{ $project->name }}' />
    </div>
    <div class="py-2">
      <x-label>Description (optional)</x-label>
      <x-textarea name='description' value="{{ $project->description }}" />
    </div>
    <div class="py-2">
      <x-label>Budget</x-label>
      <x-main-input name='budget' type='number' placeholder='Budget...' value="{{ $project->budget }}"/>
    </div>
    <div class="py-2">
      <button type="submit" class="btn">edit project</button>
    </div>
    </form>
  </div>
</div>
@endsection