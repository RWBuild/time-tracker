{{-- Message --}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@if (Session::has('success'))
    <div class="bg-indigo-900 text-center py-4 lg:px-4" style="background: green; color: white; display: flex; align-items: center; justify-content: center">
        <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert" style="text-align: center">
          <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3" style="text-align: center">New success</span>
          <span class="font-semibold mr-2 text-left flex-auto" style="text-align: center">{{ session('success') }}</span>
          <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
        </div>
    </div>
@endif

@if (Session::has('error'))
    <div class="bg-red-900 text-center py-4 lg:px-4">
        <div class="p-2 bg-red-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
            <span class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3">!Oops, New Error</span>
            <span class="font-semibold mr-2 text-left flex-auto">{{ session('success') }}</span>
            <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
        </div>
    </div>
@endif
