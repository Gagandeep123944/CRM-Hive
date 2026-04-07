<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fontsource/inter@5.1.1/400.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fontsource/inter@5.1.1/500.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fontsource/inter@5.1.1/600.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fontsource/inter@5.1.1/700.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin_layout.css') }}">
</head>
<body>
    <!--div class="sidebar-overlay" id="sidebarOverlay"></div-->
    @include('admin_layout.partials.sidebar')

    <div class="main-content" id="mainContent">
        <header class="top-navbar d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <button class="sidebar-toggle" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>
                <div class="search-box d-none d-md-block"><i class="bi bi-search"></i><input type="text" class="form-control form-control-sm" placeholder="Search..."></div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <button class="dark-toggle" onclick="toggleDarkMode()" title="Toggle theme"><i class="bi bi-moon-stars" id="themeIcon"></i></button>
                <div class="position-relative">
                    <button class="dark-toggle position-relative" onclick="toggleNotifications()"><i class="bi bi-bell"></i><span class="notification-badge" id="notifCount">3</span></button>
                    <div class="dropdown-menu dropdown-menu-end p-0 shadow" style="width: 300px; display:none;" id="notifDropdown">
                        <div class="d-flex justify-content-between align-items-center p-2 border-bottom"><h6 class="mb-0 small fw-bold">Notifications</h6><a href="#" class="text-decoration-none" style="font-size: 0.7rem;" onclick="clearNotifications()">Mark all read</a></div>
                        <div class="scrollbar-light" style="max-height: 250px; overflow-y: auto;">
                            <div class="p-2 border-bottom bg-light-subtle"><div class="d-flex align-items-start gap-2"><div class="activity-icon bg-success bg-opacity-10 text-success" style="width: 28px; height: 28px;"><i class="bi bi-check-circle"></i></div><div><div style="font-size: 0.8rem; font-weight: 500;">New sale completed</div><div class="text-muted" style="font-size: 0.7rem;">Order #1234 — $249.00</div></div></div></div>
                            <div class="p-2 border-bottom"><div class="d-flex align-items-start gap-2"><div class="activity-icon bg-primary bg-opacity-10 text-primary" style="width: 28px; height: 28px;"><i class="bi bi-person-plus"></i></div><div><div style="font-size: 0.8rem; font-weight: 500;">New user registered</div><div class="text-muted" style="font-size: 0.7rem;">sarah@example.com</div></div></div></div>
                            <div class="p-2"><div class="d-flex align-items-start gap-2"><div class="activity-icon bg-warning bg-opacity-10 text-warning" style="width: 28px; height: 28px;"><i class="bi bi-exclamation-triangle"></i></div><div><div style="font-size: 0.8rem; font-weight: 500;">Server load high</div><div class="text-muted" style="font-size: 0.7rem;">CPU at 92%</div></div></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="p-3">
            @yield('dashboard')
            @yield('reports')
            @yield('users')
            @yield('packages')
            @yield('projects')
            @yield('add_package')
        </main>
    </div>

    <div class="modal fade" id="settingsModal" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content">
        <div class="modal-header border-0 pb-0"><h6 class="modal-title fw-bold">Settings</h6><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
        <div class="modal-body">
            <div class="form-check form-switch mb-2"><input class="form-check-input" type="checkbox" id="emailNotif" checked><label class="form-check-label small" for="emailNotif">Email Notifications</label></div>
            <div class="form-check form-switch mb-2"><input class="form-check-input" type="checkbox" id="pushNotif" checked><label class="form-check-label small" for="pushNotif">Push Notifications</label></div>
            <div class="mb-2"><label class="form-label small fw-medium">Currency</label><select class="form-select form-select-sm"><option>USD ($)</option><option>EUR (€)</option><option>GBP (£)</option></select></div>
        </div>
        <div class="modal-footer border-0 pt-0"><button class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button><button class="btn btn-sm btn-primary" data-bs-dismiss="modal">Save</button></div>
    </div></div></div>

    <div class="modal fade" id="helpModal" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content">
        <div class="modal-header border-0 pb-0"><h6 class="modal-title fw-bold">Help Center</h6><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
        <div class="modal-body">
            <div class="accordion" id="helpAccordion">
                <div class="accordion-item border-0 mb-2"><h2 class="accordion-header"><button class="accordion-button collapsed small fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#help1">How do I export my data?</button></h2><div id="help1" class="accordion-collapse collapse" data-bs-parent="#helpAccordion"><div class="accordion-body small text-muted">Click the Export button in the top bar or use the Export menu in the sidebar.</div></div></div>
                <div class="accordion-item border-0"><h2 class="accordion-header"><button class="accordion-button collapsed small fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#help2">How often is data refreshed?</button></h2><div id="help2" class="accordion-collapse collapse" data-bs-parent="#helpAccordion"><div class="accordion-body small text-muted">Dashboard data refreshes every 5 minutes automatically.</div></div></div>
            </div>
        </div>
    </div></div></div>

    <div class="modal fade" id="addTaskModal" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content">
        <div class="modal-header border-0 pb-0"><h6 class="modal-title fw-bold">Add Task</h6><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
        <div class="modal-body">
            <div class="mb-2"><label class="form-label small fw-medium">Title</label><input type="text" class="form-control form-control-sm" id="taskTitle"></div>
            <div class="mb-2"><label class="form-label small fw-medium">Description</label><textarea class="form-control form-control-sm" id="taskDesc" rows="2"></textarea></div>
            <div class="row g-2"><div class="col-6"><label class="form-label small fw-medium">Priority</label><select class="form-select form-select-sm" id="taskPriority"><option value="bg-primary">Low</option><option value="bg-warning">Medium</option><option value="bg-danger">High</option></select></div><div class="col-6"><label class="form-label small fw-medium">Due Date</label><input type="date" class="form-control form-control-sm" id="taskDue"></div></div>
        </div>
        <div class="modal-footer border-0 pt-0"><button class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button><button class="btn btn-sm btn-primary" onclick="addTask()">Add</button></div>
    </div></div></div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100" id="toastContainer"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
    <script src="{{ asset('js/admin_layout.js') }}"></script>
</body>
</html>




 <script>

    document.getElementById('planType').addEventListener('change', function () {
        let marriedPlan = document.getElementById('marriedPlan');

        if (this.value === 'married') {
            marriedPlan.style.display = 'block';
        } else {
            marriedPlan.style.display = 'none';
        }
    });

</script>
