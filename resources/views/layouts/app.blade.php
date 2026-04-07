<!doctype html>
<html lang="en">

<head>
    <title>@yield('title', 'Tourist Management')</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="layout-body" style="background-image: url('@yield('bg-image', '/upload/default-bg.jpg')'); background-size: cover; background-position: center;">
    <header>
        @include('components.header')
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </header>

    <main class="layout-main">
        @yield('content')
    </main>

    <div id="mini-cart" class="mini-cart">
    <div class="mini-cart-header">
        <h3>Your Cart</h3>
        <span id="close-cart">✖</span>
    </div>

    <div id="mini-cart-items"></div>

    <div class="mini-cart-footer">
        <h4>Total: ₹<span id="mini-cart-total">0</span></h4>
        <a href="/cart" class="checkout-btn">View Cart</a>
    </div>
</div>

    <footer>
        @include('components.footer')
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
