@extends('admin_layout.master')


@section('dashboard')
<div id="section-dashboard" class="section-content">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 animate-in">
                    <div><h5 class="fw-bold mb-0">Dashboard</h5><p class="text-muted mb-0" style="font-size: 0.85rem;">Overview of your metrics</p></div>
                    <div class="d-flex gap-2 mt-2 mt-md-0">
                        <button class="filter-btn active" onclick="setDateRange(this)">7D</button>
                        <button class="filter-btn" onclick="setDateRange(this)">30D</button>
                        <button class="filter-btn" onclick="setDateRange(this)">90D</button>
                        <button class="filter-btn" onclick="exportData('csv')"><i class="bi bi-download me-1"></i>Export</button>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-6 col-xl-3 animate-in">
                        <div class="card stat-card h-100">
                            <div class="card-body">
                                <div class="kpi-header">
                                    <div>
                                        <p class="kpi-label">Total Revenue</p>
                                        <h4 class="kpi-value" id="kpiRevenue">$48,295</h4>
                                    </div>
                                    <div class="icon-wrapper" style="background: rgba(102,126,234,0.15); color: #667eea;"><i class="bi bi-currency-dollar"></i></div>
                                </div>
                                <div class="kpi-trend"><span class="trend-up"><i class="bi bi-arrow-up-right"></i>12.5%</span><span class="trend-text">vs last period</span></div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-xl-3 animate-in">
                        <div class="card stat-card h-100">
                            <div class="card-body">
                                <div class="kpi-header">
                                    <div>
                                        <p class="kpi-label">Total Users</p>
                                        <h4 class="kpi-value" id="kpiUsers">12,458</h4>
                                    </div>
                                    <div class="icon-wrapper" style="background: rgba(25,135,84,0.15); color: #198754;"><i class="bi bi-people"></i></div>
                                </div>
                                <div class="kpi-trend"><span class="trend-up"><i class="bi bi-arrow-up-right"></i>8.2%</span><span class="trend-text">vs last period</span></div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-xl-3 animate-in">
                        <div class="card stat-card h-100">
                            <div class="card-body">
                                <div class="kpi-header">
                                    <div>
                                        <p class="kpi-label">Orders</p>
                                        <h4 class="kpi-value" id="kpiOrders">3,842</h4>
                                    </div>
                                    <div class="icon-wrapper" style="background: rgba(220,53,69,0.15); color: #dc3545;"><i class="bi bi-bag"></i></div>
                                </div>
                                <div class="kpi-trend"><span class="trend-down"><i class="bi bi-arrow-down-right"></i>3.1%</span><span class="trend-text">vs last period</span></div>
                                 
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-xl-3 animate-in">
                        <div class="card stat-card h-100">
                            <div class="card-body">
                                <div class="kpi-header">
                                    <div>
                                        <p class="kpi-label">Conversion</p>
                                        <h4 class="kpi-value" id="kpiConversion">4.6%</h4>
                                    </div>
                                    <div class="icon-wrapper" style="background: rgba(255,193,7,0.15); color: #ffc107;"><i class="bi bi-percent"></i></div>
                                </div>
                                <div class="kpi-trend"><span class="trend-up"><i class="bi bi-arrow-up-right"></i>1.2%</span><span class="trend-text">vs last period</span></div>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-lg-8 animate-in">
                        <div class="card chart-card h-100">
                            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pt-2 px-3">
                                <div><h6 class="fw-bold mb-0" style="font-size: 0.9rem;">Revenue Analytics</h6><p class="text-muted mb-0" style="font-size: 0.75rem;">Monthly overview</p></div>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-sm btn-outline-primary active" style="font-size: 0.7rem; padding: 0.2rem 0.5rem;" onclick="switchChartType(this, 'line')">Line</button>
                                    <button class="btn btn-sm btn-outline-primary" style="font-size: 0.7rem; padding: 0.2rem 0.5rem;" onclick="switchChartType(this, 'bar')">Bar</button>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="chart-container" style="height: 250px;"><canvas id="revenueChart"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 animate-in">
                        <div class="card chart-card h-100">
                            <div class="card-header bg-transparent border-0 pt-2 px-3"><h6 class="fw-bold mb-0" style="font-size: 0.9rem;">Traffic Sources</h6></div>
                            <div class="card-body pt-0">
                                <div class="chart-container" style="height: 160px;"><canvas id="trafficChart"></canvas></div>
                                <div class="mt-2">
                                    <div class="d-flex justify-content-between align-items-center mb-1"><div class="d-flex align-items-center gap-1"><div style="width: 8px; height: 8px; border-radius: 50%; background: #667eea;"></div><span style="font-size: 0.75rem;">Organic</span></div><span style="font-size: 0.75rem; font-weight: 500;">42%</span></div>
                                    <div class="d-flex justify-content-between align-items-center mb-1"><div class="d-flex align-items-center gap-1"><div style="width: 8px; height: 8px; border-radius: 50%; background: #764ba2;"></div><span style="font-size: 0.75rem;">Social</span></div><span style="font-size: 0.75rem; font-weight: 500;">28%</span></div>
                                    <div class="d-flex justify-content-between align-items-center"><div class="d-flex align-items-center gap-1"><div style="width: 8px; height: 8px; border-radius: 50%; background: #43e97b;"></div><span style="font-size: 0.75rem;">Direct</span></div><span style="font-size: 0.75rem; font-weight: 500;">30%</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-lg-6 animate-in">
                        <div class="card chart-card h-100">
                            <div class="card-header bg-transparent border-0 pt-2 px-3"><h6 class="fw-bold mb-0" style="font-size: 0.9rem;">User Engagement</h6></div>
                            <div class="card-body pt-0">
                                <div class="chart-container" style="height: 220px;"><canvas id="engagementChart"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 animate-in">
                        <div class="card chart-card h-100">
                            <div class="card-header bg-transparent border-0 pt-2 px-3"><h6 class="fw-bold mb-0" style="font-size: 0.9rem;">Performance Metrics</h6></div>
                            <div class="card-body pt-0">
                                <div class="chart-container" style="height: 220px;"><canvas id="radarChart"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-lg-8 animate-in">
                        <div class="card chart-card">
                            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pt-2 px-3">
                                <h6 class="fw-bold mb-0" style="font-size: 0.9rem;">Recent Transactions</h6>
                                <button class="btn btn-sm btn-outline-primary" style="font-size: 0.7rem;" onclick="refreshTable()"><i class="bi bi-arrow-clockwise me-1"></i>Refresh</button>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0" id="transactionsTable">
                                        <thead>
                                            <tr><th onclick="sortTable(0)" style="font-size: 0.7rem;">ID <i class="bi bi-arrow-down-up"></i></th><th onclick="sortTable(1)" style="font-size: 0.7rem;">Customer <i class="bi bi-arrow-down-up"></i></th><th onclick="sortTable(2)" style="font-size: 0.7rem;">Amount <i class="bi bi-arrow-down-up"></i></th><th onclick="sortTable(3)" style="font-size: 0.7rem;">Status <i class="bi bi-arrow-down-up"></i></th><th onclick="sortTable(4)" style="font-size: 0.7rem;">Date <i class="bi bi-arrow-down-up"></i></th><th style="font-size: 0.7rem;">Actions</th></tr>
                                        </thead>
                                        <tbody id="transactionsBody"></tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-between align-items-center p-2 border-top">
                                    <span class="text-muted" style="font-size: 0.75rem;">Showing <span id="tableRange">1-10</span> of <span id="tableTotal">50</span></span>
                                    <nav><ul class="pagination pagination-sm pagination-custom mb-0" id="tablePagination"></ul></nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 animate-in">
                        <div class="card chart-card h-100">
                            <div class="card-header bg-transparent border-0 pt-2 px-3"><h6 class="fw-bold mb-0" style="font-size: 0.9rem;">Activity Heatmap</h6></div>
                            <div class="card-body pt-0">
                                <div id="heatmapContainer" class="mb-2"></div>
                                <div class="d-flex align-items-center gap-1 justify-content-end">
                                    <span class="text-muted" style="font-size: 0.65rem;">Less</span>
                                    <div class="heatmap-cell level-0"></div><div class="heatmap-cell level-1"></div><div class="heatmap-cell level-2"></div><div class="heatmap-cell level-3"></div><div class="heatmap-cell level-4"></div>
                                    <span class="text-muted" style="font-size: 0.65rem;">More</span>
                                </div>
                                <hr class="my-2">
                                <div class="mt-2">
                                    <div class="d-flex justify-content-between mb-1"><span style="font-size: 0.75rem;">Page Views</span><span style="font-size: 0.75rem; font-weight: 600;">48,295</span></div>
                                    <div class="progress progress-thin mb-2"><div class="progress-bar" style="width: 78%; background: var(--primary-gradient);"></div></div>
                                    <div class="d-flex justify-content-between mb-1"><span style="font-size: 0.75rem;">Bounce Rate</span><span style="font-size: 0.75rem; font-weight: 600;">32%</span></div>
                                    <div class="progress progress-thin mb-0"><div class="progress-bar bg-danger" style="width: 32%;"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-lg-7 animate-in">
                        <div class="card chart-card h-100">
                            <div class="card-header bg-transparent border-0 pt-2 px-3"><h6 class="fw-bold mb-0" style="font-size: 0.9rem;">Geographic Distribution</h6></div>
                            <div class="card-body pt-0">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <svg class="world-map-svg" viewBox="0 0 800 400">
                                            <path class="map-region" d="M150,100 L200,80 L250,90 L270,120 L240,160 L200,170 L160,150 Z"></path>
                                            <path class="map-region" d="M220,180 L240,200 L230,280 L200,300 L180,270 L190,220 Z"></path>
                                            <path class="map-region" d="M380,80 L450,70 L480,90 L470,130 L430,140 L390,130 L370,100 Z"></path>
                                            <path class="map-region" d="M380,150 L420,140 L450,180 L440,250 L400,280 L370,250 L360,200 Z"></path>
                                            <path class="map-region" d="M500,80 L600,70 L680,100 L690,160 L650,200 L580,210 L520,180 L500,130 Z"></path>
                                            <path class="map-region" d="M600,240 L680,230 L720,250 L710,290 L660,310 L610,280 Z"></path>
                                        </svg>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="region-item"><span>🌎 North America</span><span class="badge bg-primary custom-badge">35%</span></div>
                                        <div class="region-item"><span>🌍 Europe</span><span class="badge bg-info custom-badge">28%</span></div>
                                        <div class="region-item"><span>🌏 Asia Pacific</span><span class="badge bg-success custom-badge">42%</span></div>
                                        <div class="region-item"><span>🌎 South America</span><span class="badge bg-warning custom-badge text-dark">12%</span></div>
                                        <div class="region-item"><span>🌍 Africa</span><span class="badge bg-secondary custom-badge">8%</span></div>
                                        <div class="region-item"><span>🌏 Oceania</span><span class="badge bg-dark custom-badge">5%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 animate-in">
                        <div class="card chart-card h-100">
                            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pt-2 px-3">
                                <h6 class="fw-bold mb-0" style="font-size: 0.9rem;">Live Activity</h6>
                                <div class="d-flex align-items-center gap-1"><div class="live-dot"></div><span class="text-success" style="font-size: 0.7rem;">Live</span></div>
                            </div>
                            <div class="card-body p-0">
                                <div class="scrollbar-light" style="max-height: 280px; overflow-y: auto;" id="activityFeed"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-12 animate-in">
                        <div class="card chart-card">
                            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pt-2 px-3">
                                <h6 class="fw-bold mb-0" style="font-size: 0.9rem;">Tasks & Projects</h6>
                                <button class="btn btn-sm btn-primary" style="font-size: 0.7rem;" onclick="showModal('addTaskModal')"><i class="bi bi-plus-lg me-1"></i>Add Task</button>
                            </div>
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <div class="kanban-column" id="todoColumn">
                                            <h6 class="small fw-bold text-muted text-uppercase mb-2"><i class="bi bi-circle me-1"></i>To Do <span class="badge bg-secondary ms-1" id="todoCount">3</span></h6>
                                            <div class="task-card" draggable="true"><div class="d-flex justify-content-between mb-1"><span class="badge bg-primary custom-badge">Design</span><i class="bi bi-three-dots text-muted" style="cursor: pointer; font-size: 0.8rem;"></i></div><p style="font-size: 0.8rem; font-weight: 500; margin-bottom: 0.2rem;">Redesign landing page</p><div class="d-flex justify-content-between align-items-center"><span class="text-muted" style="font-size: 0.65rem;">Due Mar 15</span></div></div>
                                            <div class="task-card" draggable="true"><div class="d-flex justify-content-between mb-1"><span class="badge bg-success custom-badge">Feature</span><i class="bi bi-three-dots text-muted" style="cursor: pointer; font-size: 0.8rem;"></i></div><p style="font-size: 0.8rem; font-weight: 500; margin-bottom: 0.2rem;">API integration</p><div class="d-flex justify-content-between align-items-center"><span class="text-muted" style="font-size: 0.65rem;">Due Mar 20</span></div></div>
                                            <div class="task-card" draggable="true"><div class="d-flex justify-content-between mb-1"><span class="badge bg-warning custom-badge text-dark">Bug</span><i class="bi bi-three-dots text-muted" style="cursor: pointer; font-size: 0.8rem;"></i></div><p style="font-size: 0.8rem; font-weight: 500; margin-bottom: 0.2rem;">Fix mobile nav bug</p><div class="d-flex justify-content-between align-items-center"><span class="text-muted" style="font-size: 0.65rem;">Due Mar 12</span></div></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="kanban-column" id="progressColumn">
                                            <h6 class="small fw-bold text-warning text-uppercase mb-2"><i class="bi bi-arrow-right-circle me-1"></i>In Progress <span class="badge bg-warning ms-1" id="progressCount">2</span></h6>
                                            <div class="task-card" draggable="true"><div class="d-flex justify-content-between mb-1"><span class="badge bg-info custom-badge">Analytics</span><i class="bi bi-three-dots text-muted" style="cursor: pointer; font-size: 0.8rem;"></i></div><p style="font-size: 0.8rem; font-weight: 500; margin-bottom: 0.2rem;">Build dashboard</p><div class="d-flex justify-content-between align-items-center"><span class="text-muted" style="font-size: 0.65rem;">Due Mar 10</span></div></div>
                                            <div class="task-card" draggable="true"><div class="d-flex justify-content-between mb-1"><span class="badge bg-danger custom-badge">Urgent</span><i class="bi bi-three-dots text-muted" style="cursor: pointer; font-size: 0.8rem;"></i></div><p style="font-size: 0.8rem; font-weight: 500; margin-bottom: 0.2rem;">DB migration</p><div class="d-flex justify-content-between align-items-center"><span class="text-muted" style="font-size: 0.65rem;">Due Mar 8</span></div></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="kanban-column" id="doneColumn">
                                            <h6 class="small fw-bold text-success text-uppercase mb-2"><i class="bi bi-check-circle me-1"></i>Completed <span class="badge bg-success ms-1" id="doneCount">2</span></h6>
                                            <div class="task-card" draggable="true"><div class="d-flex justify-content-between mb-1"><span class="badge bg-secondary custom-badge">Security</span><i class="bi bi-three-dots text-muted" style="cursor: pointer; font-size: 0.8rem;"></i></div><p style="font-size: 0.8rem; font-weight: 500; margin-bottom: 0.2rem;">SSL renewal</p><div class="d-flex justify-content-between align-items-center"><span class="text-success" style="font-size: 0.65rem;"><i class="bi bi-check-lg"></i>Done</span></div></div>
                                            <div class="task-card" draggable="true"><div class="d-flex justify-content-between mb-1"><span class="badge bg-primary custom-badge">Design</span><i class="bi bi-three-dots text-muted" style="cursor: pointer; font-size: 0.8rem;"></i></div><p style="font-size: 0.8rem; font-weight: 500; margin-bottom: 0.2rem;">Component library</p><div class="d-flex justify-content-between align-items-center"><span class="text-success" style="font-size: 0.65rem;"><i class="bi bi-check-lg"></i>Done</span></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection