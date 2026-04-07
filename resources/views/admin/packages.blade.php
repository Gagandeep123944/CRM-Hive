@extends('admin_layout.master')


@section('packages')
<div id="section-packages" class="section-content">
                 <div class="animate-in"><h5 class="fw-bold mb-0">All packages</h5>
                    <p class="text-muted mb-3" style="font-size: 0.85rem;">Manage all package</p>
                        <div class="card chart-card"><div class="card-body p-0">
                            <a href="/admin/add_packages" class="btn btn-primary" data-section="add_package"><i class="bi bi-plus"></i><span class="nav-text">Add Packages</span></a>
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    
                                    <thead><tr><th style="font-size: 0.7rem;">Packages</th><th style="font-size: 0.7rem;">Role</th><th style="font-size: 0.7rem;">Status</th><th style="font-size: 0.7rem;">Actions</th></tr></thead>
                                    <tbody>
                                        <tr><td><div class="d-flex align-items-center gap-2"><div style="width: 28px; height: 28px; border-radius: 50%; background: #667eea; color: white; display: flex; align-items: center; justify-content: center; font-size: 0.65rem; font-weight: bold;">SW</div><div><div style="font-size: 0.8rem; font-weight: 500;">Sarah Wilson</div><div class="text-muted" style="font-size: 0.7rem;">sarah@co.com</div></div></div></td><td><span class="badge bg-primary custom-badge">Admin</span></td><td><span class="badge bg-success custom-badge">Active</span></td><td><button class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></button></td></tr>
                                        <tr><td><div class="d-flex align-items-center gap-2"><div style="width: 28px; height: 28px; border-radius: 50%; background: #198754; color: white; display: flex; align-items: center; justify-content: center; font-size: 0.65rem; font-weight: bold;">MB</div><div><div style="font-size: 0.8rem; font-weight: 500;">Mike Brown</div><div class="text-muted" style="font-size: 0.7rem;">mike@co.com</div></div></div></td><td><span class="badge bg-info custom-badge">Editor</span></td><td><span class="badge bg-success custom-badge">Active</span></td><td><button class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></button></td></tr>
                                    </tbody>
                                </table>
                            </div>
                </div></div>
            </div>
@endsection