<div class="dashboard-content">
  <!-- nav bar -->
  <div class="dashboard-topbar shadow">
      <div class="toggle">
          {{-- <i id="menu-icon" class='bx bx-menu'></i> --}}
      </div>
      <div class="search-bar">
          {{-- <input type="text" name="" id="" placeholder="Search Here ...">
          <i class='bx bx-search'></i> --}}
      </div>
      <div class="nav-right-side">
            <div class="">
                <div class="nav-item" style="margin-right: 30px;">
                    <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                </div>
            </div>

            <div class="">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    
                    <div class="nav-item dropdown" style="margin-right: 30px;">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url('/home')}}">{{__('Dashboard')}}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
          
          <div class="user-icon-dropdown" style="float:left;">
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                
            </ul>
            </div>
      </div>
  </div>
</div>

<script>
    var notification_btn = document.getElementById('notification-open-menu');
    var notification_list = document.getElementById('notification-list');

    notification_btn.addEventListener('click', () => {
        console.log("Clicked");
        notification_list.classList.toggle('list-active');
    });
</script>