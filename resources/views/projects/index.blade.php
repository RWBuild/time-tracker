@extends('layout.app')


@section('content')
    @include('common.alert')
    <div class="flex justify-center items-center  bg-gray-100 sticky top-0 z-50 ">
        <h1 class="font-bold text-4xl text-center text-gray-700 m-3 p-4">Projects</h1>
    </div>

    <div class=" bg-gray-100 flex flex-col justify-center items-center min-h-screen">
        <div class="flex flex-col  mb-14 ">

            @forelse ($clients as $client)




                <div>
                    <p class="font-bold text-xl m-2"> Client : {{ $client->name }}</p>
                </div>


                <table class="bg-white w-tablewidth">


                    @forelse ($client->projects as $project)
                        <tr class="border-b-2">



                            <td class=" w-3/4 ">

                                <p class="ml-2">{{ $project->name }}</p>
                            </td>

                            <td class=" w-1/4 ">


                                @if (Auth::User()->isAdmin() || Auth::User()->isOwner())

                                    <button class="btn-card"> <a
                                            href="/projects/{{ $project->id }}/edit">edit</a></button>
                                @endif
                                <button class="btn-card"> <a href="/projects/{{ $project->id }}">view</a></button>

                            </td>
                        </tr>
                    @empty
                        <div class="bg-white p-10 text-center">
                            <p class="bg-red-100">No projects assigned to this client</p>
                        </div>

                    @endforelse

                </table>

                <div>
                    @if (Auth::User()->isAdmin() || Auth::User()->isOwner())
                    

                        <button class="button mb-8 w-32"> <a href="/projects/create" class="">Add
                                Project</a></button>

                    @endif
                </div>



            @empty
                <p>No projects in the database.</p>
            @endforelse

        </div>


    </div>

@endsection
