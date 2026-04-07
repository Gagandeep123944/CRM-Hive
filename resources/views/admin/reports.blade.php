@extends('admin_layout.master')

@section('reports')
<div id="section-reports" class="section-content">
                <div class="animate-in"><h5 class="fw-bold mb-0">Reports</h5><p class="text-muted mb-3" style="font-size: 0.85rem;">Generate and manage reports</p>
                    <div class="card chart-card"><div class="card-body">
                        <div class="row g-2 mb-3">
                            <div class="col-md-3"><label class="form-label small">Report Type</label><select class="form-select form-select-sm"><option>Revenue Report</option><option>User Activity Report</option><option>Sales Report</option></select></div>
                            <div class="col-md-2"><label class="form-label small">Start Date</label><input type="date" class="form-control form-control-sm" value="2024-01-01"></div>
                            <div class="col-md-2"><label class="form-label small">End Date</label><input type="date" class="form-control form-control-sm" value="2024-12-31"></div>
                            <div class="col-md-2 d-flex align-items-end"><button class="btn btn-primary btn-sm w-100" onclick="generateReport()">Generate</button></div>
                        </div>
                        <div id="reportPreview" style="display:none;"><hr><div class="chart-container" style="height: 250px;"><canvas id="reportChart"></canvas></div></div>
                    </div></div>
                </div>
            </div>
@endsection            