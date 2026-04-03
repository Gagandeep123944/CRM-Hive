@extends('layouts.app')
@section('title', 'Login')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endpush
@section('content')
    <div class="login">
    <img src="{{ asset('assets/img/login-bg.png') }}" alt="login image" class="login__img">

    <form action="{{ route('login') }}" method="POST" class="login__form">
        @csrf

        <h1 class="login__title">Login</h1>

        {{-- Session Status --}}
        @if (session('status'))
            <div style="color: green; margin-bottom:10px;">
                {{ session('status') }}
            </div>
        @endif

        <div class="login__content">

            {{-- Email --}}
            <div class="login__box">
                <i class="ri-user-3-line login__icon"></i>

                <div class="login__box-input">
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="login__input @error('email') is-invalid @enderror"
                        id="login-email"
                        placeholder=" "
                        autocomplete="off"
                    >
                    <label for="login-email" class="login__label">Email</label>
                </div>
            </div>

            @error('email')
                <p style="color:red; font-size:12px;">{{ $message }}</p>
            @enderror


            {{-- Password --}}
            <div class="login__box">
                <i class="ri-lock-2-line login__icon"></i>

                <div class="login__box-input">
                    <input
                        type="password"
                        name="password"
                        required
                        class="login__input @error('password') is-invalid @enderror"
                        id="login-pass"
                        placeholder=" "
                    >
                    <label for="login-pass" class="login__label">Password</label>
                    <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                </div>
            </div>

            @error('password')
                <p style="color:red; font-size:12px;">{{ $message }}</p>
            @enderror

        </div>

        {{-- Remember + Forgot --}}
        <div class="login__check">
            <div class="login__check-group">
                <input
                    type="checkbox"
                    name="remember"
                    class="login__check-input"
                    id="login-check"
                >
                <label for="login-check" class="login__check-label">Remember me</label>
            </div>

            {{-- <a href="{{ route('password.request') }}" class="login__forgot">
                Forgot Password?
            </a> --}}
        </div>

        {{-- Submit --}}
        <button type="submit" class="login__button">Login</button>

        {{-- Register --}}
        <p class="login__register">
            Don't have an account?
            <a href="{{ route('register') }}">Register</a>
        </p>

    </form>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endpush
