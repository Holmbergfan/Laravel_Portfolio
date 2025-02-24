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
        @auth
            <form method="POST" action="{{ route('logout') }}" class="nav-auth">
                @csrf
                <button type="submit" class="btn btn-auth">Logout</button>
            </form>
        @endauth
    </div>
</header>

