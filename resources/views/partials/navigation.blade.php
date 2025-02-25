<header class="navbar">
    <div class="container nav-inner">
      <nav class="nav-main">
        <ul>
          <li><a href="{{ route('home') }}">Home</a></li>

          @php
            // Grab unique categories
            $uniqueCats = $projects->pluck('category')->unique();
          @endphp

          @foreach($uniqueCats as $cat)
            <li>
              <a href="#{{ strtolower($cat) }}">{{ $cat }}</a>
            </li>
          @endforeach
        </ul>
      </nav>

      <div class="nav-auth">
        {{-- Check admin guard, not the default web --}}
        @auth('admin')
          <div class="user-menu">
            <button class="user-icon">
              <img src="/storage/icons/user.svg" alt="User">
            </button>
            <div class="user-dropdown">
              <a href="{{ route('admin.dashboard') }}">Dashboard</a>
              <form method="POST" action="{{ route('admin.logout') }}">
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
