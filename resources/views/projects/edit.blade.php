@extends('layout.app')


@section('content')
    <div class=" bg-gray-100 flex flex-col justify-center items-center min-h-screen">
        @include('common.alert')
        <header class="font-bold text-xl text-center text-gray-700 m-4"> Edit :{{ $project->name }} </header>
        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('put')


            <div class="input-field">
                <x-label> Project name</x-label>
                <x-input type="text" id="clientid" name="name" value="{{ $project->name }}"></x-input>

                <div class="error">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>



            </div>


            <div class="input-field">
                <x-label>Budget</x-label>
                <x-input type="text" id="budget" name="budget" value="{{ $project->budget }}"></x-input>
                <div class="error">
                    @error('budget')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="input-field">
                <x-label>Client</x-label>
                <select name="client_id"
                    class="rounded-md shadow-sm border-gray-300 m-2 focus:border-indigo-300
                                                                            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-64">


                    @foreach ($clients as $client)

                        <option value="{{ $client->id }} " @if ($client->id == $project->client_id) selected @endif>{{ $client->name }} </option>

                    @endforeach


                </select>



                <div class="error">
                    @error('address')
                        {{ $message }}
                    @enderror

                </div>


            </div>


            <div class="input-field">
                <x-label>description</x-label>

                <textarea id="description" name="description"
                    class="rounded-md shadow-sm border-gray-300 m-2 focus:border-indigo-300
                                     focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-64"
                    value="{{ $project->description }}">{{ $project->description }}</textarea>

                <div class="error">
                    @error('description')
                        {{ $message }}
                    @enderror

                </div>


            </div>

            <div class="flex justify-center">
                <button type="submit" class="button">Update</button>
            </div>





        </form>

    </div>

@endsection
