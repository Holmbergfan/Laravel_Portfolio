<header class="navbar">
    <div class="container nav-inner">
        <nav class="nav-main">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#apps">Apps</a></li>
                <li><a href="#web">Web</a></li>
                <li><a href="#3d">3D</a></li>
                <li><a href="#experimental">Experimental</a></li>
            </ul>
        </nav>

        <div class="nav-auth">
          @auth
            <div class="user-menu">
              <button class="user-icon">
                <img src="/storage/icons/user.svg" alt="User">
              </button>
              <div class="user-dropdown">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit">Logout</button>
                </form>
              </div>
            </div>
          @else
            <a href="{{ route('login') }}" class="btn-auth">Login</a>
          @endauth
        </div>
    </div>
</header>
