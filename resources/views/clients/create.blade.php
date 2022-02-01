@extends('layouts.main')

@section('page-title') Create Client @endsection

@section('content') 
@include('includes.main-nav')

<div class="wrapper">
  <div class="card">
    <p>This is my form</p>
  <form action="{{ route('clients.store') }}" method="POST">
    @csrf
    <div class="py-2 flex space-x-2 items-center">
      <div>
        <x-input label="Name *" id='name' placeholder='name' name='name' />
        {{-- <label for="name">Name *</label>
        <input type="text" name="name" id="name"
        class=" @error('name')
          border border-red-500
        @enderror "
        >
        @error('name')
          <pre class="text-red-500">{{ $message }}</pre>
        @enderror --}}
      </div>
      <div>
        <label for="code">Code *</label>
        <input type="text" name="code" id="code"
        class=" @error('code')
        border border-red-500
      @enderror "
        >
        @error('code')
          <pre class="text-red-500">{{ $message }}</pre>
        @enderror
      </div>
    </div>
    <div class="py-2 flex space-x-2 items-center">
      <div>
        <label for="address">Address (optional)</label>
        <textarea name="address" id="address" cols="30" rows="10"></textarea>
      </div>
      <div>
        <label for="phone">Phone</label>
        <input type="tel" name="phone" id="phone">
      </div>
    </div>
    <div>
      <button type="submit" class="btn">create client</button>
    </div>
  </form> 

  </div>
</div>


@endsection
