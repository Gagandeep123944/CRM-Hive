@extends('layouts.app')

@section('title', 'Register')

@section('bg-image', asset('upload/register-bg.jpg'))

@section('content')

    <div class="register-container">
        <div class="register-card">
            <h2 class="register-title">Register</h2>

            @if ($errors->any())
                <div class="register-error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="register-grid">
                    <div class="register-form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="register-form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="register-form-group">
                        <label>Password</label>
                        <input type="password" name="password" required autocomplete="new-password">
                    </div>

                    <div class="register-form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" required>
                    </div>
                </div>

                <button type="submit" class="register-btn">Register</button>
            </form>

            <p class="register-footer-text">
                Already have an account?
                <a href="{{ route('login') }}">Login</a>
            </p>
        </div>
    </div>

@endsection
