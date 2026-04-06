@extends('layouts.guest')
@section('title', 'Login')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
    <div class="login-container" style="background: url('{{ asset('upload/login-bg.jpg') }}') no-repeat center center/cover;">
        <div class="login-card">
            <form action="{{ route('login') }}" method="POST" id="loginForm" novalidate>
                @csrf

                <h1>Welcome Back</h1>
                <p class="subtitle">Login to continue your journey</p>

                <div class="form-group">
                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder=" ">
                    <label>Email Address</label>
                    <small class="error-message"></small>
                </div><br>

                @error('email')
                    <p class="server-error">{{ $message }}</p>
                @enderror

                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder=" " autocomplete="new-password">
                    <label>Password</label>
                    <span class="toggle-password" id="togglePassword">👁</span>
                    <small class="error-message"></small>
                </div>

                @error('password')
                    <p class="server-error">{{ $message }}</p>
                @enderror

                <button type="submit">Sign In</button>

                <p class="register-link">
                    Don’t have an account? <a href="{{ route('register') }}">Create account</a>
                </p>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/login.js') }}"></script>
@endpush
