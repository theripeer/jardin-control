<ul class="list-unstyled topbar-menu float-end mb-0">
    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <span class="account-user-avatar"> 
                <img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="user-image" class="rounded-circle">
            </span>
            <span>
                <span class="account-user-name">{{ auth()->user()->name}}</span>
                <span class="account-position">{{ auth()->user()->rol}}</span>
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
            <!-- item-->
            <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome !</h6>
            </div>

            <!-- item-->
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class="mdi mdi-logout me-1"></i> Salir
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
</ul>
<button class="button-menu-mobile open-left">
    <i class="mdi mdi-menu"></i>
</button>