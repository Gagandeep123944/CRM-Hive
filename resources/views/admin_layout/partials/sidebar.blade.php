<nav class="sidebar scrollbar-custom" id="sidebar">
        <div class="sidebar-brand">
            <div class="sidebar-brand-icon"><i class="bi bi-bar-chart-line-fill"></i></div>
            <span class="sidebar-brand-text">TMS</span>
        </div>
        <div class="sidebar-nav">
            <div class="nav-section-title">Main</div>
            <a href="/admin/dashboard" class="nav-link active" data-section="dashboard"><i class="bi bi-grid-1x2-fill"></i><span class="nav-text">Dashboard</span></a>
            <a href="/admin/reports" class="nav-link" data-section="reports"><i class="bi bi-file-earmark-bar-graph"></i><span class="nav-text">Reports</span></a>
            <div class="nav-section-title mt-3">Management</div>
            <a href="/admin/users" class="nav-link" data-section="users" ><i class="bi bi-people"></i><span class="nav-text">Users</span><span class="badge bg-light text-dark ms-auto nav-text">24</span></a>
            <a href="/admin/projects" class="nav-link" data-section="projects"><i class="bi bi-folder"></i><span class="nav-text">Projects</span></a>
            <a href="/admin/packages" class="nav-link" data-section="packages"><i class="bi bi-box"></i><span class="nav-text">Packages</span></a>
            <div class="nav-section-title mt-3">Settings</div>
            <a href="#" class="nav-link" onclick="showModal('settingsModal')"><i class="bi bi-gear"></i><span class="nav-text">Settings</span></a>
            <a href="#" class="nav-link" onclick="showModal('helpModal')"><i class="bi bi-question-circle"></i><span class="nav-text">Help</span></a>
        </div>
        <div class="sidebar-user">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Ccircle cx='16' cy='16' r='16' fill='%23667eea'/%3E%3Ctext x='50%25' y='55%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='11' font-weight='bold'%3EJD%3C/text%3E%3C/svg%3E" alt="User">
            <div class="user-info"><div class="name">John Doe</div><div class="role">Admin</div></div>
        </div>
    </nav>