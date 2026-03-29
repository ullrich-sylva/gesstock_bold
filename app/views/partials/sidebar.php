<?php
$user = getCurrentUser();
?>
<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo APP_URL; ?>/dashboard">
                    <i class="bi bi-house"></i> Tableau de bord
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo APP_URL; ?>/equipement">
                    <i class="bi bi-box"></i> Équipements
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo APP_URL; ?>/categorie">
                    <i class="bi bi-tags"></i> Catégories
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo APP_URL; ?>/fournisseur">
                    <i class="bi bi-shop"></i> Fournisseurs
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo APP_URL; ?>/entree-stock">
                    <i class="bi bi-arrow-down"></i> Entrées stock
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo APP_URL; ?>/sortie-stock">
                    <i class="bi bi-arrow-up"></i> Sorties stock
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo APP_URL; ?>/demande-materiel">
                    <i class="bi bi-file-earmark"></i> Demandes matériel
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo APP_URL; ?>/bon-livraison">
                    <i class="bi bi-package"></i> Bons livraison
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo APP_URL; ?>/inventaire">
                    <i class="bi bi-list-check"></i> Inventaires
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo APP_URL; ?>/alerte">
                    <i class="bi bi-exclamation-triangle"></i> Alertes
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo APP_URL; ?>/rapport">
                    <i class="bi bi-graph-up"></i> Rapports
                </a>
            </li>
            
            <?php if ($user && $user['role'] === 'admin'): ?>
                <hr>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo APP_URL; ?>/utilisateur">
                        <i class="bi bi-people"></i> Utilisateurs
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
