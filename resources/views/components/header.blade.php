{{-- <div class="top">
    <div class="logo-container">
        <img src="https://i.pinimg.com/736x/e1/5b/90/e15b900581f75d0b0fa0deb6a5785908.jpg" class="logo">
        <span class="logo-text">FioRio.Tourism</span>
    </div>

    <div class="nav">
        <a href="{{ route('home') }}" class="btn">Home</a>
        <a href="{{ route('packages') }}" class="btn">Packages</a>
        <a href="/cart" class="btn cart-icon">
            🛒
            <span id="cart-count">0</span>
        </a>
        <a href="{{ route('register') }}" class="btn">Sign up</a>
        <a href="{{ route('login') }}" class="btn">Sign in</a>
    </div>
</div> --}}

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">TMS</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <svg width="40" height="40" viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="gradHome" x1="0%" y1="0%" x2="100%"
                                    y2="100%">
                                    <stop offset="0%" style="stop-color:#667eea" />
                                    <stop offset="100%" style="stop-color:#764ba2" />
                                </linearGradient>
                            </defs>
                            <rect width="120" height="120" rx="25" fill="url(#gradHome)" />
                            <path d="M30 55 L60 30 L90 55" stroke="white" stroke-width="4" fill="none"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <rect x="40" y="55" width="40" height="30" rx="5" stroke="white"
                                stroke-width="3" fill="none" />
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('packages') }}" class="nav-link">
                        <svg width="40" height="40" viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="gradSuitcase" x1="0%" y1="0%" x2="100%"
                                    y2="100%">
                                    <stop offset="0%" style="stop-color:#f093fb" />
                                    <stop offset="100%" style="stop-color:#f5576c" />
                                </linearGradient>
                            </defs>
                            <rect width="120" height="120" rx="25" fill="url(#gradSuitcase)" />
                            <rect x="35" y="45" width="50" height="35" rx="6" stroke="white"
                                stroke-width="3" fill="none" />
                            <path d="M45 45 V35 H75 V45" stroke="white" stroke-width="3" fill="none" />
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/cart" class="nav-link cart-icon">
                        <svg width="40" height="40" viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="gradCart" x1="0%" y1="0%" x2="100%"
                                    y2="100%">
                                    <stop offset="0%" style="stop-color:#ff9a9e" />
                                    <stop offset="100%" style="stop-color:#fad0c4" />
                                </linearGradient>
                            </defs>
                            <rect width="120" height="120" rx="25" fill="url(#gradCart)" />
                            <circle cx="50" cy="85" r="5" fill="white" />
                            <circle cx="75" cy="85" r="5" fill="white" />
                            <path d="M35 40 H45 L50 70 H80 L85 50 H50" stroke="white" stroke-width="3" fill="none"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span id="cart-count">0</span>
                    </a>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Action 1</a>
                        <a class="dropdown-item" href="#">Action 2</a>
                    </div>
                </li> --}}
            </ul>
            <a href="{{ route('register') }}" class="btn-outline-success my-2 my-sm-0">
                <svg width="40" height="40" viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="gradSignup" x1="0%" y1="0%" x2="100%"
                            y2="100%">
                            <stop offset="0%" style="stop-color:#43e97b;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#38f9d7;stop-opacity:1" />
                        </linearGradient>
                    </defs>
                    <rect width="120" height="120" rx="25" fill="url(#gradSignup)" />
                    <circle cx="60" cy="50" r="15" stroke="white" stroke-width="3" fill="none" />
                    <path d="M35 85 C35 70, 85 70, 85 85" stroke="white" stroke-width="3" fill="none" />
                    <circle cx="85" cy="35" r="10" fill="white" />
                    <path d="M85 30 V40 M80 35 H90" stroke="#38f9d7" stroke-width="2" />
                </svg>
            </a>
            &nbsp;
            <a href="{{ route('login') }}" class="btn-outline-success my-2 my-sm-0">
                <svg width="40" height="40" viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="gradLogin" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#4facfe;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#00f2fe;stop-opacity:1" />
                        </linearGradient>
                    </defs>
                    <rect width="120" height="120" rx="25" fill="url(#gradLogin)" />
                    <path d="M45 60 H75 M65 50 L75 60 L65 70" stroke="white" stroke-width="4" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <rect x="35" y="35" width="40" height="50" rx="8" stroke="white"
                        stroke-width="3" fill="none" />
                </svg>
            </a>

        </div>
    </div>
</nav>
