<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon blue">
            <i data-lucide="clipboard-check" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Inventaire #<?php echo $inventaire['id_inventaire']; ?></h1>
            <p class="page-subtitle">Détails de l'inventaire réalisé le <?php echo date('d/m/Y', strtotime($inventaire['date_inventaire'])); ?></p>
        </div>
    </div>
    <a href="<?php echo APP_URL; ?>/inventaire" class="btn btn-secondary">
        <i data-lucide="arrow-left" style="width:16px;height:16px;"></i> Retour
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="detail-grid">
            <div class="detail-item">
                <div class="detail-label">Note / Observation</div>
                <div class="detail-value"><?php echo htmlspecialchars($inventaire['observation'] ?? '—'); ?></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Réalisé par</div>
                <div class="detail-value"><?php echo htmlspecialchars(($inventaire['utilisateur_prenom'] ?? '') . ' ' . ($inventaire['utilisateur_nom'] ?? '')); ?></div>
            </div>
        </div>
    </div>
</div>
