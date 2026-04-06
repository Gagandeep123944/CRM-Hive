@extends('layouts.app')
@section('title', 'Get in Touch')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #c084fc;">Contact the Crew</h2>
        <p class="text-muted">Have questions about a tour? We're here to help.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="p-5 rounded-4 shadow-sm border bg-white">
                <form action="#" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control rounded-3" placeholder="Your Name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control rounded-3" placeholder="Email@example.com">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Subject</label>
                            <input type="text" class="form-control rounded-3">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Message</label>
                            <textarea class="form-control rounded-3" rows="5"></textarea>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn px-5 py-2 text-white fw-bold"
                                    style="background: linear-gradient(135deg, #6366f1, #a855f7); border-radius: 10px;">
                                Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
