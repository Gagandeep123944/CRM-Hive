@props(['brand' => 'TMS Adventure'])

<nav class="tms-navbar">
    <div class="nav-container">
        <a href="{{ url('/') }}" class="nav-logo">
            <span class="logo-icon">🌍</span> {{ $brand }}
        </a>

        <ul class="nav-links">
            @php
                $menuItems = [
                    ['route' => 'home', 'label' => 'Dashboard', 'icon' => '📊'],
                    ['route' => 'about', 'label' => 'About', 'icon' => '📖'],
                    ['route' => 'contact', 'label' => 'Contact', 'icon' => '✉️'],
                    // ['route' => 'tours', 'label' => 'Manage Tours', 'icon' => '🗺️'],
                    // ['route' => 'bookings', 'label' => 'Bookings', 'icon' => '🎟️'],
                ];
            @endphp

            @foreach ($menuItems as $item)
                <li>
                    <a href="{{ route($item['route']) }}"
                        class="{{ request()->routeIs($item['route']) ? 'active' : '' }}">
                        <span class="icon">{{ $item['icon'] }}</span> {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="nav-actions">
            @auth
                <div class="user-profile">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=818cf8&color=fff"
                        alt="avatar">
                    <div class="dropdown">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn-login">Login</a>
                <a href="{{ route('register') }}" class="btn-register-nav">Join Now</a>
            @endauth
        </div>
    </div>
</nav>
