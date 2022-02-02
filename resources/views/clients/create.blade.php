@extends('layout.app')


@section('content')
<div class=" bg-gray-100 flex flex-col justify-center items-center min-h-screen">

  <header class="font-bold text-4xl text-center text-gray-700 m-2"> Add Clients </header>

</div>

    @if(session()->has('client-message-true'))
        @php
            $status_msg = "new";
            if (str_contains((String)'client-message-true', '-')) {
                $message_status = explode("-", 'client-message-true');
                if(!$message_status[2]){
                   $status_msg = "error";
                }
            }
        @endphp
        <div class='bg-indigo-900 text-center py-4 lg:px-4'>
            <div class='p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex' role='alert'>
                <span class='flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3'>{{ $status_msg }}</span>
                <span class='font-semibold mr-2 text-left flex-auto'>{{ session()->get('client-message-true') }}</span>
                <svg class='fill-current opacity-75 h-4 w-4' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><path d='M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z'/></svg>
            </div>
        </div>
    @endif

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
