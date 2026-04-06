@extends('layouts.guest')
@section('title', 'Join the Adventure')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endpush

@section('content')
    <div class="register-wrapper">
        <div class="register-container">
            <div class="register-image-section">
                <img src="{{ asset('upload/register-bg.jpg') }}" alt="adventure">
                <div class="image-overlay">
                    <h3>The World Awaits 🌌</h3>
                    <p>Unlock exclusive access to premium features.</p>
                </div>
            </div>

            <div class="register-form-section">
                <div class="register-card">
                    <h2>Create Account</h2>
                    <p class="subtitle">Join our community today</p>

                    <form action="{{ route('register') }}" method="POST" id="registerForm" novalidate>
                        @csrf

                        <div class="form-group">
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                placeholder=" ">
                            <label>Full Name</label>
                            @error('name')
                                <small class="server-error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                placeholder=" ">
                            <label>Email Address</label>
                            @error('email')
                                <small class="server-error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" id="password" required placeholder=" "
                                autocomplete="new-password">
                            <label>Password</label>
                            <span class="toggle-password" id="togglePasswordReg">👁</span>
                            @error('password')
                                <small class="server-error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" name="password_confirmation" id="password_confirmation" required
                                placeholder=" ">
                            <label>Confirm Password</label>
                        </div>

                        <button type="submit" class="btn-register">Sign Up Now</button>

                        <p class="login-link">
                            Already a member? <a href="{{ route('login') }}">Log In</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/register.js') }}"></script>
@endpush
