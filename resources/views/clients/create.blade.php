@extends('layouts.main')

@section('page-title') Create Client @endsection

@section('content') 
@include('includes.main-nav')

<div class="wrapper">
  <div class="card">
   <div class="mb-2">
    <h3 class="text-2xl font-bold text-primary">Create Client,</h3>
    <p>fill out form fields</p>
   </div>
   <div class="py-1">
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
   </div>
  <form action="{{ route('clients.store') }}" method="POST">
    @csrf
    <div class="py-2">
        <x-label>Name *</x-label>
        <x-main-input name='name' type='text' placeholder='Name...'/>
    </div>
    <div class="py-2">
        <x-label>Code *</x-label>
        <x-main-input  name='code' type='text' placeholder='code...' />
    </div>
    <div class="py-2">
     
       <x-label>Address (optional)</x-label>
       <x-textarea name='address' />
    </div>
    <div class="py-2">
      <x-label>Phone</x-label>
      <x-main-input  name='phone' type='tel' placeholder='telephone...' />
    </div>
    <div>
      <button type="submit" class="btn">create client</button>
    </div>
  </form> 

  </div>
</div>


@endsection
