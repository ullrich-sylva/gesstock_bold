<?php
$user = getCurrentUser();
$initials = '';
if ($user) {
    $initials = strtoupper(substr($user['prenom'] ?? '', 0, 1) . substr($user['nom'] ?? '', 0, 1));
    if (empty(trim($initials))) {
        $initials = strtoupper(substr($user['login'] ?? 'U', 0, 2));
    }
    
    // Count unread alerts
    require_once APP_PATH . '/models/AlerteModel.php';
    $alerteNavModel = new AlerteModel();
    $unreadCount = count($alerteNavModel->getActive());
}
?>
<nav class="navbar-main">
    <button class="sidebar-toggle" id="sidebarToggle" aria-label="Menu">
        <i data-lucide="menu" style="width:22px;height:22px;"></i>
    </button>
    
    <a class="navbar-brand-integrated" href="<?php echo APP_URL; ?>/dashboard">
        <div class="navbar-brand-logo-circle">
            <img src="<?php echo APP_URL; ?>/public/img/logo.png" alt="Bold Technology">
        </div>
        <span class="navbar-brand-name">BOLD STOCK</span>
    </a>
    
    <div class="navbar-divider d-none d-lg-block"></div>
    
    <div class="d-none d-lg-flex ms-auto me-auto">
        <ul class="navbar-nav navbar-center">
            <li class="nav-item"><a class="nav-link" href="<?php echo APP_URL; ?>/dashboard"><i data-lucide="layout-dashboard" style="width:16px;height:16px;"></i> Tableau de Bord</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo APP_URL; ?>/equipement"><i data-lucide="cpu" style="width:16px;height:16px;"></i> Équipements</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo APP_URL; ?>/entree-stock"><i data-lucide="package-plus" style="width:16px;height:16px;"></i> Entrées</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo APP_URL; ?>/sortie-stock"><i data-lucide="package-minus" style="width:16px;height:16px;"></i> Sorties</a></li>
        </ul>
    </div>
    
    <ul class="navbar-nav ms-auto" style="gap:4px;">
        <?php if ($user): ?>
            <li class="nav-item nav-notification">
                <a class="nav-link position-relative" href="<?php echo APP_URL; ?>/alerte" title="Alertes">
                    <i data-lucide="bell" style="width:18px;height:18px;"></i>
                    <?php if ($unreadCount > 0): ?>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px; padding: 2px 5px; margin-top: 8px; margin-left: -5px;">
                            <?php echo $unreadCount; ?>
                        </span>
                    <?php endif; ?>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle navbar-user" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="navbar-user-avatar"><?php echo $initials; ?></div>
                    <div class="navbar-user-info d-none d-md-flex">
                        <span class="navbar-user-name"><?php echo htmlspecialchars($user['login'] ?? 'User'); ?></span>
                        <span class="navbar-user-role"><?php echo ucfirst($user['role'] ?? 'user'); ?></span>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="<?php echo APP_URL; ?>/auth/logout"><i data-lucide="log-out" style="width:14px;height:14px;margin-right:8px;"></i>Déconnexion</a></li>
                </ul>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo APP_URL; ?>/auth/login">
                    <i data-lucide="log-in" style="width:16px;height:16px;"></i> Connexion
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
