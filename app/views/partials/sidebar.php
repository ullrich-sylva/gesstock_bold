<?php
$user = getCurrentUser();
$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
$basePath = '/GestionStock_bold';

function isActive($path, $currentPath, $basePath) {
    $full = $basePath . $path;
    if ($path === '/dashboard') {
        return ($currentPath === $full || $currentPath === $basePath || $currentPath === $basePath . '/');
    }
    return strpos($currentPath, $full) === 0;
}
?>
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header d-lg-none d-flex justify-content-between align-items-center p-3">
        <h5 class="mb-0">MENU</h5>
        <button class="btn-close btn-close-white" id="sidebarClose"></button>
    </div>
    <div class="sidebar-section-label">Navigation</div>
    <nav class="nav flex-column">
        <a class="nav-link <?php echo isActive('/dashboard', $currentPath, $basePath) ? 'active' : ''; ?>" href="<?php echo APP_URL; ?>/dashboard">
            <i data-lucide="layout-dashboard"></i> <span>Tableau de Bord</span>
        </a>
        <a class="nav-link <?php echo isActive('/equipement', $currentPath, $basePath) ? 'active' : ''; ?>" href="<?php echo APP_URL; ?>/equipement">
            <i data-lucide="cpu"></i> <span>Équipements</span>
        </a>
        <?php if (Auth::hasAnyRole(['admin', 'gestionnaire'])): ?>
            <a class="nav-link <?php echo isActive('/categorie', $currentPath, $basePath) ? 'active' : ''; ?>" href="<?php echo APP_URL; ?>/categorie">
                <i data-lucide="folder-open"></i> <span>Catégories</span>
            </a>
            <a class="nav-link <?php echo isActive('/fournisseur', $currentPath, $basePath) ? 'active' : ''; ?>" href="<?php echo APP_URL; ?>/fournisseur">
                <i data-lucide="building-2"></i> <span>Fournisseurs</span>
            </a>
        <?php endif; ?>
    </nav>

    <hr class="sidebar-divider">
    <div class="sidebar-section-label">Stock</div>
    <nav class="nav flex-column">
        <a class="nav-link <?php echo isActive('/entree-stock', $currentPath, $basePath) ? 'active' : ''; ?>" href="<?php echo APP_URL; ?>/entree-stock">
            <i data-lucide="package-plus"></i> <span>Entrées Stock</span>
        </a>
        <a class="nav-link <?php echo isActive('/sortie-stock', $currentPath, $basePath) ? 'active' : ''; ?>" href="<?php echo APP_URL; ?>/sortie-stock">
            <i data-lucide="package-minus"></i> <span>Sorties Stock</span>
        </a>
        <a class="nav-link <?php echo isActive('/demande-materiel', $currentPath, $basePath) ? 'active' : ''; ?>" href="<?php echo APP_URL; ?>/demande-materiel">
            <i data-lucide="clipboard-list"></i> <span>Demandes Matériel</span>
        </a>
        <a class="nav-link <?php echo isActive('/bon-livraison', $currentPath, $basePath) ? 'active' : ''; ?>" href="<?php echo APP_URL; ?>/bon-livraison">
            <i data-lucide="truck"></i> <span>Bons de Livraison</span>
        </a>
    </nav>

    <hr class="sidebar-divider">
    <div class="sidebar-section-label">Suivi</div>
    <nav class="nav flex-column">
        <a class="nav-link <?php echo isActive('/inventaire', $currentPath, $basePath) ? 'active' : ''; ?>" href="<?php echo APP_URL; ?>/inventaire">
            <i data-lucide="clipboard-check"></i> <span>Inventaires</span>
        </a>
        <a class="nav-link <?php echo isActive('/alerte', $currentPath, $basePath) ? 'active' : ''; ?>" href="<?php echo APP_URL; ?>/alerte">
            <i data-lucide="bell-ring"></i> <span>Alertes</span>
        </a>
        <?php if (Auth::hasAnyRole(['admin', 'gestionnaire'])): ?>
            <a class="nav-link <?php echo isActive('/rapport', $currentPath, $basePath) ? 'active' : ''; ?>" href="<?php echo APP_URL; ?>/rapport">
                <i data-lucide="bar-chart-3"></i> <span>Rapports</span>
            </a>
        <?php endif; ?>
    </nav>

    <?php if (Auth::isAdmin()): ?>
        <hr class="sidebar-divider">
        <div class="sidebar-section-label">Administration</div>
        <nav class="nav flex-column">
            <a class="nav-link <?php echo isActive('/utilisateur', $currentPath, $basePath) ? 'active' : ''; ?>" href="<?php echo APP_URL; ?>/utilisateur">
                <i data-lucide="users"></i> <span>Utilisateurs</span>
            </a>
        </nav>
    <?php endif; ?>
</aside>
