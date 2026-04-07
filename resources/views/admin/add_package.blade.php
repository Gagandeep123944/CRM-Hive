@extends('admin_layout.master')

@section('add_package')
<div id="section-add_package" class="section-content fit-section">
    <div class="container mt-4">
        <div class="card shadow-sm p-4" style="max-width: 800px; margin:auto;">
            <h4 class="fw-bold mb-4 text-center">Add Package</h4>
            <form action="/add_package" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Package Name -->
                <div class="mb-3">
                <label class="form-label">Package Name</label>
                <input type="text" name="package_name" class="form-control" placeholder="Enter package name" required>
                </div>
                <!-- Duration -->
                <div class="mb-3">
                <label class="form-label">Package Duration</label>
                <input type="text" name="package_duration" class="form-control" placeholder="e.g. 5 Days / 4 Nights" required>
                </div>
                <!-- Cost -->
                <div class="mb-3">
                <label class="form-label">Package Cost</label>
                <input type="number" name="package_cost" class="form-control" placeholder="Enter cost" required>
                </div>
                <!-- Covered Places -->
                <div class="mb-3">
                <label class="form-label">Places Covered</label>
                <input type="text"  name="package_covered" class="form-control" placeholder="e.g. Goa, Manali, Jaipur" required>
                </div>
                <!-- Description -->
                <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control"  name="package_description" rows="3" placeholder="Enter package details"></textarea>
                </div>
                <div class="mb-3">
                <label class="form-label">Package Image</label>
                <input type="file" name="image" class="form-control">
                </div>
                <!-- Date Range -->
                <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">From Date</label>
                    <input type="date" name="from_date" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">To Date</label>
                    <input type="date" name="to_date" class="form-control" required>
                </div>
                </div>
                <!-- Plan Type -->
                <div class="mb-3">
                <label class="form-label">Plan Type</label>
                <select class="form-select" name="plane_type" id="planType">
                    <option value="">Select Plan</option>
                    <option value="single">Single</option>
                    <option value="married">Couple</option>
                </select>
                </div>
                <!-- Married Plan -->
                <div id="marriedPlan" style="display:none;">
                <h6 class="fw-bold mt-3">Couple Plan Details</h6>
                <div class="mb-3">
                    <label class="form-label">Price for Couple</label>
                    <input type="number" class="form-control" name="couple_price" placeholder="Enter couple plan price">
                </div>
                </div>
                <!-- Submit -->
                <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Save Package</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection