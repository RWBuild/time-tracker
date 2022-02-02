<div class="main-nav">
  <div>
      <a href="/" class="text-xl font-black flex items-center space-x-1"><i class="ri-timer-2-line text-4xl"></i><span>Time Tracker</span> </a>
  </div>

  @if (Route::has('login'))
      @auth
      <ul class="flex space-x-4">
          <li><a class="text-lg font-semibold" href="/clients">Clients</a></li>
          <li><a class="text-lg font-semibold" href="/projects">Projects</a></li>
          <li><a class="text-lg font-semibold" href="/time-entries">Time Entry</a></li>
      </ul>
      <div>
         <div class="flex items-center space-x-1">
          <p class="text-sm">{{ Auth::user()->name }}</p>
          <form method="POST" action="{{ route('logout') }}">
              @csrf

              <button type="submit" class="btn btn-danger">
                  {{ __('Log Out') }}
              </button>
          </form>
         </div>
      </div>
      @endauth

      @guest
      <div>
          <a href="/login" class="btn">Login</a>
          <a href="/register" class="btn">Register</a>
      </div>
      @endguest
  @endif
 
  
</div>