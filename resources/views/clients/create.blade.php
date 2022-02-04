@extends('layout.app')


@section('content')
    <div class=" bg-gray-100 flex flex-col justify-center items-center min-h-screen">
        @include('common.alert')
        <header class="font-bold text-4xl text-center text-gray-700 m-2"> Add Client </header>

        <form class="form_container" action="{{ route('clients.store') }}" method="POST">
            @csrf
            <div class="input-field">


                <x-label>Fullname</x-label>
                <x-input type="text" name='name' placeholder="Fullname" />

                <div class="error">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>



            </div>


            <div class="input-field">
                <x-label>Code</x-label>
                <x-input type="text" name='code' placeholder="Code" />


                <div class="error">
                    @error('code')
                        {{ $message }}
                    @enderror
                </div>


            </div>
            <div class="input-field">
                <x-label>Address</x-label>
                <x-input type="text" id="address" name="address" placeholder="Address"></x-input>

                <div class="error">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>


            </div>


            <div class="input-field">
                <x-label>Phone</x-label>
                <x-input type="number" id="address" name="phone" placeholder="+250 ...."></x-input>
                <div class="error">
                    @error('phone')
                        {{ $message }}
                    @enderror

                </div>


            </div>


            <div class="flex justify-center">
                <x-button type="submit">Add Client</x-button>
            </div>



        </form>

    </div>

@endsection
