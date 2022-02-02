@extends('layout.app')


@section('content')
<div class=" bg-slate-200  sm:flex flex col justify-center items-center">

    <main class=" ">
        <div class=" sm:px-6 lg:px-8 md:h-screen sm:h-screen">
         
          <div class=" flex px-4 pt-6 sm:px-0  w-full ">
            <div class=" rounded-lg md:h-96 w-1/2">
              <div class=" main-right flex  	flex-col">
                <div class="experience flex justify-center  ">
                  <span class="flex  	flex-row ">
                    <h1 class="font-bold leading-6 text-3xl">15</h1>
                    <span class="ml-2">
                      <p>Lorem Ipsum </p>
                      <p>Lorem Ipsum </p>
                    </span>
                  </span>
                  <span class="flex  	flex-row md:ml-12 sm:ml-0">
                    <h1 class="font-bold leading-6 text-3xl">2M</h1>

                    <span class="ml-2">
                      <p>Lorem Ipsum </p>
                      <p>Lorem Ipsum </p>
                    </span>
                  </span>
                </div>
                        
                <div class="md:px-20 md:py-10 sm:px-0 sm:py-1 mt-2 ">

                  <h1 class="font-bold md:text-2xl sm:text-sm  mb-10 z-10 relative ">
                    Lorem Ipsum  Lorem Ipsum  Lorem Ipsum 
                  </h1>
                    
                    
                  <p class="  sm:text-xs md:text-sm lg:text-xl relative z-10">
                    t is a long established fact that a reader will be
                    distracted by the readable content of a page when looking
                    at its layout. The point of using Lorem Ipsum is that it
                    has a more-or-less normal distribution of letters, as
                    opposed to using 'Content here, content
                  </p>

               
                </div>
                
              </div>
            </div>
            <div class=" rounded-lg  w-1/2 pr-6">
              {" "}
             <div class=" bg-gray-800 h-24 w-24 z-0  top-20 absolute "></div> 
              <div class=" z-10 relative   w-full">
                <img src="{{ asset('/asset/images/cool.png') }}"class="object-cover w-full ml-2 rounded-r-lg  ">
              </div>
               <div class=" bg-gray-800  sm:h-10 sm:w-10 md:h-28 md:w-24  z-0 absolute bottom-0 sm:right-50 md:right-20"></div> 
              <div class=" bg-white sm:h-10 sm:w-10 md:h-48 md:w-48 rounded-full z-0 absolute top-60 left-80"></div>
              <div class=" bg-blue-200 sm:h-10 sm:w-10 md:h-64 md:w-64 rounded-full z-0 absolute top-60 left-40"></div>
            </div>
          </div>
         
        </div>
      </main>
</div>


@endsection