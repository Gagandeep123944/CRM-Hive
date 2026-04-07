@extends('layouts.app')

@section('title', 'Packages')

@section('bg-image', asset('upload/package-bg.jpg'))

<style>
    body {
        background-position: top center !important;
    }
</style>

@section('content')
    <div class="packages-container">
        <h1 class="page-title">Explore Packages</h1>

        <div class="packages-grid">

            <!-- Package 1 -->
            <div class="package-card">
                <div class="package-image"></div>
                <div class="package-content">
                    <h3>Goa Beach Escape</h3>
                    <p>3 Nights • 4 Days</p>
                    <div class="package-footer">
                        <span class="price">₹12,999</span>
                        <a href="#" class="btn-add add-to-cart" data-id="1" data-name="Goa Beach Escape"
                            data-price="12999">
                            Add to Cart
                        </a>
                    </div>
                </div>
            </div>

            <!-- Package 2 -->
            <div class="package-card">
                <div class="package-image"></div>
                <div class="package-content">
                    <h3>Manali Adventure</h3>
                    <p>5 Nights • 6 Days</p>
                    <div class="package-footer">
                        <span class="price">₹18,499</span>
                        <a href="#" class="btn-add add-to-cart" data-id="2" data-name="Manali Adventure"
                            data-price="18499">
                            Add to Cart
                        </a>
                    </div>
                </div>
            </div>

            <!-- Package 3 -->
            <div class="package-card">
                <div class="package-image"></div>
                <div class="package-content">
                    <h3>Dubai Luxury Tour</h3>
                    <p>4 Nights • 5 Days</p>
                    <div class="package-footer">
                        <span class="price">₹45,000</span>
                        <a href="#" class="btn-add add-to-cart" data-id="3" data-name="Dubai Luxury Tour"
                            data-price="45000">
                            Add to Cart
                        </a>
                    </div>
                </div>
            </div>

            <div class="package-card">
                <div class="package-image"></div>
                <div class="package-content">
                    <h3>Dubai Luxury Tour</h3>
                    <p>4 Nights • 5 Days</p>
                    <div class="package-footer">
                        <span class="price">₹45,000</span>
                        <a href="#" class="btn-add add-to-cart" data-id="3" data-name="Dubai Luxury Tour"
                            data-price="45000">
                            Add to Cart
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
