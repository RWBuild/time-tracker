@extends('layouts.main')

@section('page-title') Edit Client: {{ $client->name }} @endsection

@section('content') 
@include('includes.main-nav')

<div class="wrapper">
  <div class="card">
    <div class="mb-2">
      <h3 class="text-2xl font-bold text-primary">Edit Client,</h3>
      <p>fill out form fields</p>
     </div>
     <div class="py-1">
      <x-auth-validation-errors class="mb-4" :errors="$errors" />
     </div>
  <form action="{{ route('clients.update', $client->id) }}" method="POST">
    @csrf
    @method('put')
    <div class="py-2">
      <x-label>Name *</x-label>
      <x-main-input name='name' type='text' placeholder='Name...' value="{{ $client->name }}" />
    </div>
    <div class="py-2">
      <x-label>Code *</x-label>
      <x-main-input  name='code' type='text' placeholder='code...' value="{{ $client->code }}" />
  </div>
  <div class="py-2">
   
     <x-label>Address (optional)</x-label>
     <x-textarea name='address' value='{{ $client->address }}' />
  </div>
  <div class="py-2">
    <x-label>Phone</x-label>
    <x-main-input  name='phone' type='tel' placeholder='telephone...' value='{{ $client->phone }}' />
  </div>
    <div>
      <button type="submit" class="btn">edit client</button>
    </div>
  </form> 

  </div>
</div>


@endsection


