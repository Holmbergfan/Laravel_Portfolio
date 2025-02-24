<header class="navbar">
    <div class="container nav-inner">
        <div class="nav-left">
            <div class="logo">Navigate -></div>
            <nav class="nav-main">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="#apps">Apps</a></li>
                    <li><a href="#web">Web</a></li>
                    <li><a href="#3d">3D</a></li>
                    <li><a href="#experimental">Experimental</a></li>
                </ul>
            </nav>
        </div>
        <div class="nav-right">
            @auth
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-admin">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-admin">Admin Login</a>
            @endauth
        </div>
    </div>
</header>