@extends('admin_layout.master')

@section('projects')

<div id="section-projects" class="section-content">
    <div class="animate-in"><h5 class="fw-bold mb-0">Projects</h5><p class="text-muted mb-3" style="font-size: 0.85rem;">Active projects</p>
        <div class="row g-2">
            <div class="col-md-6 col-lg-4"><div class="card chart-card h-100"><div class="card-body"><div class="d-flex justify-content-between mb-2"><span class="badge bg-primary custom-badge">Active</span><small class="text-muted">Due Mar 25</small></div><h6 class="fw-bold mb-1" style="font-size: 0.9rem;">Website Redesign</h6><p class="small text-muted mb-2">Complete overhaul of company website.</p><div class="d-flex justify-content-between small mb-1"><span>Progress</span><span class="fw-bold">72%</span></div><div class="progress progress-thin mb-0"><div class="progress-bar" style="width: 72%; background: var(--primary-gradient);"></div></div></div></div></div>
            <div class="col-md-6 col-lg-4"><div class="card chart-card h-100"><div class="card-body"><div class="d-flex justify-content-between mb-2"><span class="badge bg-warning custom-badge text-dark">In Review</span><small class="text-muted">Due Mar 18</small></div><h6 class="fw-bold mb-1" style="font-size: 0.9rem;">Mobile App v2.0</h6><p class="small text-muted mb-2">Major update with new features.</p><div class="d-flex justify-content-between small mb-1"><span>Progress</span><span class="fw-bold">89%</span></div><div class="progress progress-thin mb-0"><div class="progress-bar bg-warning" style="width: 89%;"></div></div></div></div></div>
            <div class="col-md-6 col-lg-4"><div class="card chart-card h-100"><div class="card-body"><div class="d-flex justify-content-between mb-2"><span class="badge bg-info custom-badge">Planning</span><small class="text-muted">Due Apr 30</small></div><h6 class="fw-bold mb-1" style="font-size: 0.9rem;">API Gateway</h6><p class="small text-muted mb-2">Centralized API management system.</p><div class="d-flex justify-content-between small mb-1"><span>Progress</span><span class="fw-bold">25%</span></div><div class="progress progress-thin mb-0"><div class="progress-bar bg-info" style="width: 25%;"></div></div></div></div></div>
        </div>
    </div>
</div>

@endsection