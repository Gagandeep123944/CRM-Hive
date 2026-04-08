@extends('layouts.app')

@section('content')

<div class="home-container">

    <!-- HERO -->
    <section class="hero">
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1>Discover Your Next Adventure ✈️</h1>
            <p>Luxury travel experiences curated for unforgettable memories.</p>

            <div class="hero-buttons">
                <a href="/packages" class="btn-primary">Explore Packages</a>
                <a href="/cart" class="btn-secondary">View Cart</a>
            </div>
        </div>
    </section>

    <!-- FEATURED PACKAGES -->
    <section class="featured">
        <h2 class="section-title">Popular Destinations</h2>

        <div class="featured-grid">

            <div class="featured-card">
                <div class="featured-img"></div>
                <h3>Goa Escape</h3>
                <p>₹12,999 • 3N/4D</p>
            </div>

            <div class="featured-card">
                <div class="featured-img"></div>
                <h3>Manali Adventure</h3>
                <p>₹18,499 • 5N/6D</p>
            </div>

            <div class="featured-card">
                <div class="featured-img"></div>
                <h3>Dubai Luxury</h3>
                <p>₹45,000 • 4N/5D</p>
            </div>

            <div class="featured-card">
                <div class="featured-img"></div>
                <h3>Bali Retreat</h3>
                <p>₹55,000 • 5N/6D</p>
            </div>

        </div>
    </section>

    <!-- WHY CHOOSE US -->
    <section class="features">
        <h2 class="section-title">Why Choose Us</h2>

        <div class="features-grid">
            <div class="feature-card">
                <h3>✈️ Easy Booking</h3>
                <p>Simple & fast booking experience.</p>
            </div>

            <div class="feature-card">
                <h3>🏨 Premium Stay</h3>
                <p>Luxury hotels & best locations.</p>
            </div>

            <div class="feature-card">
                <h3>💼 Custom Plans</h3>
                <p>Trips tailored to your needs.</p>
            </div>

            <div class="feature-card">
                <h3>📞 24/7 Support</h3>
                <p>Always there for you.</p>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="testimonials">
        <h2 class="section-title">What Our Customers Say</h2>

        <div class="testimonial-grid">
            <div class="testimonial-card">
                <p>"Best trip ever! Everything was perfectly managed."</p>
                <h4>- Rahul Sharma</h4>
            </div>

            <div class="testimonial-card">
                <p>"Amazing experience, highly recommended!"</p>
                <h4>- Priya Mehta</h4>
            </div>

            <div class="testimonial-card">
                <p>"Luxury at its best. Will travel again!"</p>
                <h4>- Aman Verma</h4>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta">
        <h2>Start Your Journey Today</h2>
        <a href="/packages" class="btn-primary">Book Now</a>
    </section>

</div>

@endsection
