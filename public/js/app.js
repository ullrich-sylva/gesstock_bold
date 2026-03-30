// ============================================================
// BOLD STOCK — Application JavaScript
// ============================================================

document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize Lucide Icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // ============================================================
    // Bootstrap Tooltips & Popovers
    // ============================================================
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    // ============================================================
    // Sidebar Toggle (Mobile)
    // ============================================================
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('show');
            if (sidebarOverlay) {
                sidebarOverlay.classList.toggle('show');
            }
        });
    }

    if (sidebarOverlay && sidebar) {
        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.remove('show');
            sidebarOverlay.classList.remove('show');
        });
    }

    // ============================================================
    // Auto-dismiss Alerts
    // ============================================================
    const alerts = document.querySelectorAll('.alert.alert-dismissible');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            alert.classList.add('dismissing');
            setTimeout(function() {
                const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                bsAlert.close();
            }, 300);
        }, 5000);
    });

    // ============================================================
    // Animate Elements on Scroll (Intersection Observer)
    // ============================================================
    const animateElements = document.querySelectorAll('.kpi-card, .card, .table-container');
    if ('IntersectionObserver' in window && animateElements.length > 0) {
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        animateElements.forEach(function(el) {
            observer.observe(el);
        });
    }

    // ============================================================
    // Active sidebar link highlight  
    // ============================================================
    const currentPath = window.location.pathname;
    const sidebarLinks = document.querySelectorAll('.sidebar .nav-link');
    sidebarLinks.forEach(function(link) {
        const href = link.getAttribute('href');
        if (href && currentPath.indexOf(new URL(href, window.location.origin).pathname) === 0) {
            link.classList.add('active');
        }
    });

});

// ============================================================
// Utility Functions
// ============================================================

// Confirm delete
function confirmDelete(message) {
    message = message || 'Êtes-vous sûr de vouloir supprimer cet élément ?';
    return confirm(message);
}

// Show alert
function showAlert(type, message) {
    const alertDiv = document.createElement('div');
    alertDiv.className = 'alert alert-' + type + ' alert-dismissible fade show';
    alertDiv.setAttribute('role', 'alert');
    
    const iconMap = {
        'success': 'check-circle-2',
        'danger': 'x-circle',
        'warning': 'alert-triangle',
        'info': 'info'
    };
    
    alertDiv.innerHTML = '<i data-lucide="' + (iconMap[type] || 'info') + '" class="alert-icon"></i>' +
        '<span>' + message + '</span>' +
        '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
    
    const container = document.querySelector('main');
    if (container) {
        container.insertBefore(alertDiv, container.firstChild);
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }
}

function showSuccess(message) { showAlert('success', message); }
function showError(message) { showAlert('danger', message); }

// Format currency
function formatCurrency(amount, currency) {
    currency = currency || 'EUR';
    return new Intl.NumberFormat('fr-FR', {
        style: 'currency',
        currency: currency
    }).format(amount);
}

// Format date
function formatDate(date, locale) {
    locale = locale || 'fr-FR';
    return new Intl.DateTimeFormat(locale, {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    }).format(new Date(date));
}

// AJAX fetch helper
function fetchData(url, options) {
    options = options || {};
    const defaultOptions = {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        }
    };
    
    return fetch(url, Object.assign({}, defaultOptions, options))
        .then(function(response) {
            if (!response.ok) {
                throw new Error('HTTP error! status: ' + response.status);
            }
            return response.json();
        });
}
