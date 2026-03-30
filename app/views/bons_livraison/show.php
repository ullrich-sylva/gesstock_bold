<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon slate">
            <i data-lucide="truck" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title"><?php echo htmlspecialchars($bon['numero_bon']); ?></h1>
            <p class="page-subtitle">Détails du bon de livraison</p>
        </div>
    </div>
    <a href="<?php echo APP_URL; ?>/bon-livraison" class="btn btn-secondary">
        <i data-lucide="arrow-left" style="width:16px;height:16px;"></i> Retour
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="detail-grid">
            <div class="detail-item">
                <div class="detail-label">Numéro de bon</div>
                <div class="detail-value"><?php echo htmlspecialchars($bon['numero_bon']); ?></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Fournisseur</div>
                <div class="detail-value"><?php echo htmlspecialchars($bon['fournisseur_nom'] ?? '—'); ?></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Récupéré par</div>
                <div class="detail-value"><?php echo htmlspecialchars(($bon['recepteur_prenom'] ?? '') . ' ' . ($bon['recepteur_nom'] ?? '')); ?></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Date de livraison</div>
                <div class="detail-value"><?php echo date('d/m/Y H:i', strtotime($bon['date_livraison'])); ?></div>
            </div>
            <div class="detail-item" style="grid-column: span 2;">
                <div class="detail-label">Observation</div>
                <div class="detail-value"><?php echo htmlspecialchars($bon['observation'] ?? '—'); ?></div>
            </div>
        </div>
    </div>
</div>
