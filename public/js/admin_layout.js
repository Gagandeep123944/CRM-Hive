    let currentTheme = 'light';
    let currentSection = 'dashboard';
    let sidebarCollapsed = false;
    let chartInstances = {};
    let tableCurrentPage = 1;
    const tablePageSize = 10;
    let allTransactions = [];

    document.addEventListener('DOMContentLoaded', () => {
        initCharts();
        initSparklines();
        populateTransactions();
        initHeatmap();
        initActivityFeed();
        initKanban();
        setInterval(updateLiveMetrics, 8000);
        toggleDarkMode();
    });

    function toggleDarkMode() {
        currentTheme = currentTheme === 'light' ? 'dark' : 'light';
        document.documentElement.setAttribute('data-bs-theme', currentTheme);
        document.getElementById('themeIcon').className = currentTheme === 'light' ? 'bi bi-moon-stars' : 'bi bi-sun';
        updateChartsTheme();
    }

    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const main = document.getElementById('mainContent');
        const overlay = document.getElementById('sidebarOverlay');
        if (window.innerWidth < 992) {
            sidebar.classList.toggle('show-mobile');
            overlay.classList.toggle('show');
        } else {
            sidebarCollapsed = !sidebarCollapsed;
            sidebar.classList.toggle('collapsed');
            main.classList.toggle('expanded');
        }
    }
    document.getElementById('sidebarOverlay').addEventListener('click', () => {
        document.getElementById('sidebar').classList.remove('show-mobile');
        document.getElementById('sidebarOverlay').classList.remove('show');
    });

    function switchSection(section, el) {
        currentSection = section;
        document.querySelectorAll('.section-content').forEach(s => s.style.display = 'none');
        document.getElementById('section-' + section).style.display = 'block';
        document.querySelectorAll('.sidebar .nav-link').forEach(n => n.classList.remove('active'));
        if (el) el.classList.add('active');
        if (window.innerWidth < 992) {
            document.getElementById('sidebar').classList.remove('show-mobile');
            document.getElementById('sidebarOverlay').classList.remove('show');
        }
       
        
    }

    function getThemeColors() {
        const isDark = currentTheme === 'dark';
        return {
            gridColor: isDark ? 'rgba(255,255,255,0.1)' : 'rgba(0,0,0,0.06)',
            textColor: isDark ? '#adb5bd' : '#6c757d'
        };
    }

    function initCharts() {
        const theme = getThemeColors();
        const tooltipOpts = {
            backgroundColor: currentTheme === 'dark' ? '#343a40' : '#fff',
            titleColor: currentTheme === 'dark' ? '#fff' : '#212529',
            bodyColor: currentTheme === 'dark' ? '#adb5bd' : '#6c757d',
            borderColor: currentTheme === 'dark' ? '#495057' : '#dee2e6',
            borderWidth: 1,
            cornerRadius: 6,
            padding: 8
        };
        const legendOpts = {
            display: true,
            position: 'top',
            labels: {
                usePointStyle: true,
                pointStyle: 'circle',
                padding: 15,
                color: theme.textColor,
                font: {
                    size: 11
                }
            }
        };

        chartInstances.revenue = new Chart(document.getElementById('revenueChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Revenue',
                    data: [18500, 22300, 19800, 27500, 32100, 28900, 35200, 38400, 34600, 42100, 39800, 48295],
                    borderColor: '#667eea',
                    backgroundColor: 'rgba(102,126,234,0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2,
                    pointRadius: 2,
                    pointHoverRadius: 5
                }, {
                    label: 'Expenses',
                    data: [12000, 14500, 13200, 16800, 19200, 17500, 21000, 22800, 20400, 24500, 23100, 27200],
                    borderColor: '#fa709a',
                    backgroundColor: 'rgba(250,112,154,0.05)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2,
                    pointRadius: 2,
                    pointHoverRadius: 5,
                    borderDash: [4, 4]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: legendOpts,
                    tooltip: tooltipOpts
                },
                scales: {
                    x: {
                        grid: {
                            color: theme.gridColor
                        },
                        ticks: {
                            color: theme.textColor,
                            font: {
                                size: 10
                            }
                        }
                    },
                    y: {
                        grid: {
                            color: theme.gridColor
                        },
                        ticks: {
                            color: theme.textColor,
                            callback: v => '$' + (v / 1000) + 'k',
                            font: {
                                size: 10
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });

        chartInstances.traffic = new Chart(document.getElementById('trafficChart').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Organic', 'Social', 'Direct'],
                datasets: [{
                    data: [42, 28, 30],
                    backgroundColor: ['#667eea', '#764ba2', '#43e97b'],
                    borderWidth: 0,
                    hoverOffset: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '65%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: tooltipOpts
                }
            }
        });

        chartInstances.engagement = new Chart(document.getElementById('engagementChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['00:00', '04:00', '08:00', '12:00', '16:00', '20:00', '24:00'],
                datasets: [{
                    label: 'Active',
                    data: [420, 280, 1850, 3200, 2890, 2450, 1200],
                    backgroundColor: 'rgba(102,126,234,0.7)',
                    borderRadius: 5
                }, {
                    label: 'Sessions',
                    data: [680, 450, 2800, 4500, 3800, 3200, 1800],
                    backgroundColor: 'rgba(67,233,123,0.7)',
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            padding: 12,
                            color: theme.textColor,
                            font: {
                                size: 10
                            }
                        }
                    },
                    tooltip: tooltipOpts
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: theme.textColor,
                            font: {
                                size: 10
                            }
                        }
                    },
                    y: {
                        grid: {
                            color: theme.gridColor
                        },
                        ticks: {
                            color: theme.textColor,
                            font: {
                                size: 10
                            }
                        }
                    }
                }
            }
        });

        chartInstances.radar = new Chart(document.getElementById('radarChart').getContext('2d'), {
            type: 'radar',
            data: {
                labels: ['Speed', 'Reliability', 'Comfort', 'Safety', 'Efficiency', 'Design'],
                datasets: [{
                    label: 'Current',
                    data: [85, 92, 78, 95, 88, 82],
                    backgroundColor: 'rgba(102,126,234,0.2)',
                    borderColor: '#667eea',
                    borderWidth: 2,
                    pointRadius: 3
                }, {
                    label: 'Previous',
                    data: [72, 85, 68, 88, 75, 70],
                    backgroundColor: 'rgba(250,112,154,0.2)',
                    borderColor: '#fa709a',
                    borderWidth: 2,
                    pointRadius: 3,
                    borderDash: [4, 4]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            padding: 12,
                            color: theme.textColor,
                            font: {
                                size: 10
                            }
                        }
                    },
                    tooltip: tooltipOpts
                },
                scales: {
                    r: {
                        grid: {
                            color: theme.gridColor
                        },
                        pointLabels: {
                            color: theme.textColor,
                            font: {
                                size: 10
                            }
                        },
                        ticks: {
                            display: false
                        },
                        suggestedMin: 0,
                        suggestedMax: 100
                    }
                }
            }
        });
    }

    function initSparklines() {
        createSparkline('sparkline1', [30, 45, 35, 50, 40, 60, 55, 70, 65, 80, 75, 90], '#667eea');
        createSparkline('sparkline2', [20, 35, 30, 45, 50, 40, 55, 60, 65, 70, 80, 85], '#198754');
        createSparkline('sparkline3', [60, 55, 50, 45, 40, 35, 38, 42, 45, 40, 38, 35], '#dc3545');
        createSparkline('sparkline4', [20, 25, 22, 30, 28, 35, 32, 38, 40, 38, 42, 46], '#ffc107');
    }

    function createSparkline(canvasId, data, color) {
        const ctx = document.getElementById(canvasId);
        if (!ctx) return;
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.map((_, i) => i),
                datasets: [{
                    data: data,
                    borderColor: color,
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    tension: 0.4,
                    pointRadius: 0,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: false
                    }
                },
                scales: {
                    x: {
                        display: false
                    },
                    y: {
                        display: false
                    }
                },
                elements: {
                    line: {
                        capBezierPoints: true
                    }
                }
            }
        });
    }




    function switchChartType(btn, type) {
        btn.parentElement.querySelectorAll('.btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const chart = chartInstances.revenue;
        chart.config.type = type;
        chart.update();
    }

    function updateChartsTheme() {
        const theme = getThemeColors();
        Object.values(chartInstances).forEach(chart => {
            if (chart.options.scales?.x) {
                chart.options.scales.x.grid.color = theme.gridColor;
                chart.options.scales.x.ticks.color = theme.textColor;
            }
            if (chart.options.scales?.y) {
                chart.options.scales.y.grid.color = theme.gridColor;
                chart.options.scales.y.ticks.color = theme.textColor;
            }
            if (chart.options.plugins?.legend?.labels) chart.options.plugins.legend.labels.color = theme.textColor;
            chart.options.plugins.tooltip.backgroundColor = currentTheme === 'dark' ? '#343a40' : '#fff';
            chart.options.plugins.tooltip.titleColor = currentTheme === 'dark' ? '#fff' : '#212529';
            chart.options.plugins.tooltip.bodyColor = currentTheme === 'dark' ? '#adb5bd' : '#6c757d';
            chart.options.plugins.tooltip.borderColor = currentTheme === 'dark' ? '#495057' : '#dee2e6';
            chart.update();
        });
    }

    function populateTransactions() {
        const statuses = ['Completed', 'Pending', 'Processing', 'Failed', 'Refunded'];
        const statusColors = {
            'Completed': 'bg-success',
            'Pending': 'bg-warning text-dark',
            'Processing': 'bg-info',
            'Failed': 'bg-danger',
            'Refunded': 'bg-secondary'
        };
        const names = ['Alice Johnson', 'Bob Smith', 'Carol Davis', 'David Wilson', 'Eva Martinez', 'Frank Brown', 'Grace Lee', 'Henry Taylor', 'Ivy Chen', 'Jack White', 'Karen Hall', 'Leo Garcia', 'Mia Anderson', 'Noah Thomas', 'Olivia Jackson', 'Paul Harris', 'Quinn Martin', 'Rachel Clark', 'Sam Lewis', 'Tina Walker', 'Uma Patel', 'Victor Young', 'Wendy King', 'Xander Scott', 'Yara Adams', 'Zack Nelson', 'Amy Roberts', 'Brian Turner', 'Cindy Phillips', 'Derek Campbell', 'Elena Parker', 'Felix Evans', 'Gina Edwards', 'Hugo Collins', 'Irene Stewart', 'Joel Sanchez', 'Kim Morris', 'Liam Rogers', 'Maya Reed', 'Nate Cook', 'Opal Morgan', 'Pete Bell', 'Quinn Murphy', 'Rosa Bailey', 'Steve Rivera', 'Tara Cooper', 'Uri Richardson', 'Vera Cox', 'Will Howard', 'Xena Ward'];
        allTransactions = names.map((name, i) => {
            const status = statuses[Math.floor(Math.random() * statuses.length)];
            return {
                id: '#' + (1000 + i),
                customer: name,
                amount: '$' + (Math.floor(Math.random() * 900) + 50) + '.' + (Math.floor(Math.random() * 99)).toString().padStart(2, '0'),
                status: status,
                statusColor: statusColors[status],
                date: new Date(2024, Math.floor(Math.random() * 12), Math.floor(Math.random() * 28) + 1).toLocaleDateString('en-US', {
                    month: 'short',
                    day: 'numeric'
                })
            };
        });
        renderTable();
    }

    function renderTable() {
        const start = (tableCurrentPage - 1) * tablePageSize;
        const end = start + tablePageSize;
        const pageData = allTransactions.slice(start, end);
        const tbody = document.getElementById('transactionsBody');
        tbody.innerHTML = pageData.map(t => `<tr><td style="font-size: 0.8rem;"><span class="fw-medium">${t.id}</span></td><td style="font-size: 0.8rem;">${t.customer}</td><td style="font-size: 0.8rem; font-weight: 500;">${t.amount}</td><td><span class="badge ${t.statusColor} custom-badge">${t.status}</span></td><td style="font-size: 0.75rem; color: var(--bs-secondary-color);">${t.date}</td><td><div class="btn-group btn-group-sm"><button class="btn btn-light" title="View"><i class="bi bi-eye"></i></button><button class="btn btn-light" title="Edit"><i class="bi bi-pencil"></i></button><button class="btn btn-light text-danger" title="Delete" onclick="deleteTransaction('${t.id}')"><i class="bi bi-trash"></i></button></div></td></tr>`).join('');
        document.getElementById('tableRange').textContent = `${start+1}-${Math.min(end,allTransactions.length)}`;
        document.getElementById('tableTotal').textContent = allTransactions.length;
        renderPagination();
    }

    function renderPagination() {
        const totalPages = Math.ceil(allTransactions.length / tablePageSize);
        const pagination = document.getElementById('tablePagination');
        let html = '';
        html += `<li class="page-item ${tableCurrentPage===1?'disabled':''}"><a class="page-link" href="#" onclick="goToPage(${tableCurrentPage-1})"><i class="bi bi-chevron-left"></i></a></li>`;
        for (let i = 1; i <= totalPages; i++) {
            if (i === 1 || i === totalPages || (i >= tableCurrentPage - 1 && i <= tableCurrentPage + 1)) {
                html += `<li class="page-item ${i===tableCurrentPage?'active':''}"><a class="page-link" href="#" onclick="goToPage(${i})">${i}</a></li>`;
            } else if (i === tableCurrentPage - 2 || i === tableCurrentPage + 2) {
                html += `<li class="page-item disabled"><a class="page-link" href="#">...</a></li>`;
            }
        }
        html += `<li class="page-item ${tableCurrentPage===totalPages?'disabled':''}"><a class="page-link" href="#" onclick="goToPage(${tableCurrentPage+1})"><i class="bi bi-chevron-right"></i></a></li>`;
        pagination.innerHTML = html;
    }

    function goToPage(page) {
        const totalPages = Math.ceil(allTransactions.length / tablePageSize);
        if (page < 1 || page > totalPages) return;
        tableCurrentPage = page;
        renderTable();
    }

    function sortTable(colIndex) {
        const keys = ['id', 'customer', 'amount', 'status', 'date'];
        const key = keys[colIndex];
        allTransactions.sort((a, b) => {
            let va = a[key],
                vb = b[key];
            if (key === 'amount') {
                va = parseFloat(va.replace('$', ''));
                vb = parseFloat(vb.replace('$', ''));
            }
            if (va < vb) return -1;
            if (va > vb) return 1;
            return 0;
        });
        tableCurrentPage = 1;
        renderTable();
    }

    function deleteTransaction(id) {
        allTransactions = allTransactions.filter(t => t.id !== id);
        renderTable();
        showToast('Deleted ' + id, 'danger');
    }

    function refreshTable() {
        const btn = event.target.closest('button');
        btn.querySelector('i').classList.add('bi-spin');
        setTimeout(() => {
            btn.querySelector('i').classList.remove('bi-spin');
            populateTransactions();
            showToast('Refreshed', 'success');
        }, 600);
    }

    function initHeatmap() {
        const container = document.getElementById('heatmapContainer');
        let html = '<div class="heatmap-grid">';
        for (let week = 0; week < 26; week++) {
            html += '<div class="heatmap-week">';
            for (let day = 0; day < 7; day++) {
                html += `<div class="heatmap-cell level-${Math.floor(Math.random()*5)}" title="${Math.floor(Math.random()*20)} contributions"></div>`;
            }
            html += '</div>';
        }
        html += '</div>';
        container.innerHTML = html;
    }

    function initActivityFeed() {
        const feed = document.getElementById('activityFeed');
        const activities = [{
            icon: 'bi-cart-check-fill',
            color: 'success',
            title: 'New order #4521',
            desc: '$249.00 — 2m ago'
        }, {
            icon: 'bi-person-plus-fill',
            color: 'primary',
            title: 'New user registered',
            desc: 'sarah@co.com — 5m ago'
        }, {
            icon: 'bi-star-fill',
            color: 'warning',
            title: '5-star review',
            desc: 'From @mike — 12m ago'
        }, {
            icon: 'bi-arrow-up-circle-fill',
            color: 'info',
            title: 'Campaign started',
            desc: 'Spring Sale — 20m ago'
        }, {
            icon: 'bi-exclamation-triangle-fill',
            color: 'danger',
            title: 'Payment failed',
            desc: 'Order #4498 — 30m ago'
        }, {
            icon: 'bi-check-circle-fill',
            color: 'success',
            title: 'Deployed v2.4.1',
            desc: '45m ago'
        }, ];
        feed.innerHTML = activities.map(a => `<div class="activity-item px-3"><div class="d-flex align-items-start gap-2"><div class="activity-icon bg-${a.color} bg-opacity-10 text-${a.color}"><i class="bi ${a.icon}"></i></div><div><div style="font-size: 0.8rem; font-weight: 500;">${a.title}</div><div class="text-muted" style="font-size: 0.7rem;">${a.desc}</div></div></div></div>`).join('');
    }

    function updateLiveMetrics() {
        const rev = document.getElementById('kpiRevenue');
        if (rev) {
            const val = parseFloat(rev.textContent.replace(/[$,]/g, ''));
            rev.textContent = '$' + (val + Math.floor(Math.random() * 100 - 30)).toLocaleString();
        }
        const usr = document.getElementById('kpiUsers');
        if (usr) {
            const val = parseInt(usr.textContent.replace(/,/g, ''));
            usr.textContent = (val + Math.floor(Math.random() * 5 - 1)).toLocaleString();
        }
    }

    function initKanban() {
        ['todoColumn', 'progressColumn', 'doneColumn'].forEach(colId => {
            const column = document.getElementById(colId);
            column.addEventListener('dragover', e => {
                e.preventDefault();
                column.style.background = currentTheme === 'dark' ? 'rgba(102,126,234,0.15)' : 'rgba(102,126,234,0.08)';
            });
            column.addEventListener('dragleave', () => {
                column.style.background = '';
            });
            column.addEventListener('drop', e => {
                e.preventDefault();
                column.style.background = '';
                const task = document.querySelector('.dragging');
                if (task) {
                    column.appendChild(task);
                    updateKanbanCounts();
                }
            });
        });
        document.querySelectorAll('.task-card').forEach(card => {
            card.addEventListener('dragstart', () => card.classList.add('dragging'));
            card.addEventListener('dragend', () => card.classList.remove('dragging'));
        });
    }

    function updateKanbanCounts() {
        document.getElementById('todoCount').textContent = document.getElementById('todoColumn').querySelectorAll('.task-card').length;
        document.getElementById('progressCount').textContent = document.getElementById('progressColumn').querySelectorAll('.task-card').length;
        document.getElementById('doneCount').textContent = document.getElementById('doneColumn').querySelectorAll('.task-card').length;
    }

    function addTask() {
        const title = document.getElementById('taskTitle').value;
        const desc = document.getElementById('taskDesc').value;
        const priority = document.getElementById('taskPriority').value;
        const due = document.getElementById('taskDue').value;
        if (!title) {
            showToast('Enter a title', 'warning');
            return;
        }
        const html = `<div class="task-card fade-in" draggable="true"><div class="d-flex justify-content-between mb-1"><span class="badge ${priority} custom-badge">New</span><i class="bi bi-three-dots text-muted" style="cursor: pointer; font-size: 0.8rem;"></i></div><p style="font-size: 0.8rem; font-weight: 500; margin-bottom: 0.2rem;">${title}</p><p class="text-muted mb-1" style="font-size: 0.7rem;">${desc}</p><div class="d-flex justify-content-between align-items-center"><span class="text-muted" style="font-size: 0.65rem;">Due ${due||'TBD'}</span></div></div>`;
        document.getElementById('todoColumn').insertAdjacentHTML('beforeend', html);
        const newCard = document.getElementById('todoColumn').lastElementChild;
        newCard.addEventListener('dragstart', () => newCard.classList.add('dragging'));
        newCard.addEventListener('dragend', () => newCard.classList.remove('dragging'));
        updateKanbanCounts();
        bootstrap.Modal.getInstance(document.getElementById('addTaskModal')).hide();
        document.getElementById('taskTitle').value = '';
        document.getElementById('taskDesc').value = '';
        document.getElementById('taskDue').value = '';
        showToast('Task added', 'success');
    }

    function toggleNotifications() {
        const dropdown = document.getElementById('notifDropdown');
        dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
    }

    function clearNotifications() {
        document.getElementById('notifCount').style.display = 'none';
        showToast('All read', 'success');
    }
    document.addEventListener('click', (e) => {
        const dropdown = document.getElementById('notifDropdown');
        const btn = document.querySelector('[onclick="toggleNotifications()"]');
        if (!dropdown.contains(e.target) && !btn.contains(e.target)) dropdown.style.display = 'none';
    });

    function setDateRange(btn) {
        btn.parentElement.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        showToast('Date range updated', 'info');
    }

    function exportData(format) {
        showToast(`Exporting as ${format.toUpperCase()}...`, 'info');
        setTimeout(() => showToast(`Exported ${format.toUpperCase()}`, 'success'), 1200);
    }

    function generateReport() {
        document.getElementById('reportPreview').style.display = 'block';
        showToast('Report generated', 'success');
        if (!chartInstances.report) {
            const ctx = document.getElementById('reportChart');
            const theme = getThemeColors();
            chartInstances.report = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Report',
                        data: Array.from({
                            length: 12
                        }, () => Math.floor(Math.random() * 50000 + 10000)),
                        borderColor: '#667eea',
                        backgroundColor: 'rgba(102,126,234,0.1)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: currentTheme === 'dark' ? '#343a40' : '#fff',
                            titleColor: currentTheme === 'dark' ? '#fff' : '#212529',
                            bodyColor: currentTheme === 'dark' ? '#adb5bd' : '#6c757d',
                            borderColor: currentTheme === 'dark' ? '#495057' : '#dee2e6',
                            borderWidth: 1,
                            cornerRadius: 6
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                color: theme.gridColor
                            },
                            ticks: {
                                color: theme.textColor
                            }
                        },
                        y: {
                            grid: {
                                color: theme.gridColor
                            },
                            ticks: {
                                color: theme.textColor
                            }
                        }
                    }
                }
            });
        }
    }

    function showModal(id) {
        new bootstrap.Modal(document.getElementById(id)).show();
    }

    function showToast(msg, type = 'info') {
        const container = document.getElementById('toastContainer');
        const icons = {
            success: 'bi-check-circle-fill',
            danger: 'bi-x-circle-fill',
            warning: 'bi-exclamation-triangle-fill',
            info: 'bi-info-circle-fill'
        };
        const id = 'toast-' + Date.now();
        const html = `<div id="${id}" class="toast align-items-center text-bg-${type} border-0 show mb-2" style="min-width: 260px;"><div class="d-flex"><div class="toast-body small"><i class="bi ${icons[type]} me-2"></i>${msg}</div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button></div></div>`;
        container.insertAdjacentHTML('beforeend', html);
        setTimeout(() => {
            const el = document.getElementById(id);
            if (el) el.remove();
        }, 2500);
    }


   

