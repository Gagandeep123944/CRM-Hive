@extends('layouts.app')

@section('title', 'Login')

@section('bg-image', asset('upload/login-bg.jpg'))

@section('content')

    <div class="login-container">
        <div class="login-card">
            <h2 class="login-title">Login</h2>

            @if ($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required autocomplete="new-password">
                </div>

                <button type="submit" class="btn-login">Login</button>
            </form>

            <p class="register-text">
                Don't have an account?
                <a href="{{ route('register') }}">Register</a>
            </p>
        </div>
    </div>

@endsection
