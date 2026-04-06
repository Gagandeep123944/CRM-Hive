@extends('layouts.app')
@section('title', 'About Our Journey')

@section('content')
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="display-4 fw-bold mb-4" style="color: #818cf8;">Our Story 🌍</h1>
            <p class="lead text-muted">We started with a simple mission: to bridge the gap between explorers and the world's most hidden gems.</p>
            <p>Our Tour Management System is built by travelers, for travelers. We provide the tools for agencies to showcase their passion and for adventurers to find their next great memory.</p>
        </div>
        <div class="col-md-6">
            <div class="rounded-4 overflow-hidden shadow-lg">
                <img src="{{ asset('upload/register-bg.jpg') }}" class="img-fluid" alt="Adventure">
            </div>
        </div>
    </div>
</div>
@endsection
