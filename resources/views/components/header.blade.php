<nav class="navbar pro-navbar" id="navbar">
    <div class="container nav-wrapper">

        <a href="#" class="brand-logo">TMS</a>

        <div class="nav-center" id="nav-center">
            <div class="active-indicator" id="indicator"></div>
            <a href="{{ route('home') }}" class="nav-icon">
                <i class="bi bi-house"></i>
            </a>
            <a href="{{ route('packages') }}" class="nav-icon">
                <i class="bi bi-briefcase"></i>
            </a>
            <a href="{{ route('cart') }}" class="nav-icon cart-icon position-relative">
                <i class="bi bi-cart"></i>
                <span id="cart-count">0</span>
            </a>
        </div>

        <div class="nav-right">
            <div class="auth-buttons">
                <a href="{{ route('login') }}" class="nav-icon">
                    <i class="bi bi-box-arrow-in-right"></i>
                </a>
                <a href="{{ route('register') }}" class="nav-icon signup-icon">
                    <i class="bi bi-person-plus"></i>
                </a>
            </div>

            <div class="user-menu" id="userMenu">
                <img src="https://i.pravatar.cc/40" class="avatar" id="avatarBtn" />
                <div class="dropdown-menu">
                    <a href="#">Profile</a>
                    <a href="#">My Orders</a>
                    <a href="#">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>
