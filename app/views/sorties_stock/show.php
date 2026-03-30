<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon red">
            <i data-lucide="package-minus" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title"><?php echo htmlspecialchars($sortie['numero_bon'] ?? 'Sortie #' . $sortie['id_sortie']); ?></h1>
            <p class="page-subtitle">Détails de la sortie de stock réalisée</p>
        </div>
    </div>
    <a href="<?php echo APP_URL; ?>/sortie-stock" class="btn btn-secondary">
        <i data-lucide="arrow-left" style="width:16px;height:16px;"></i> Retour
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="detail-grid">
            <div class="detail-item">
                <div class="detail-label">Numéro de bon</div>
                <div class="detail-value"><strong><?php echo htmlspecialchars($sortie['numero_bon'] ?? '—'); ?></strong></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Équipement</div>
                <div class="detail-value"><?php echo htmlspecialchars($sortie['equipement_nom'] ?? '—'); ?></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Quantité</div>
                <div class="detail-value"><span class="badge bg-danger"><?php echo $sortie['quantite']; ?></span></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Sortie par</div>
                <div class="detail-value"><?php echo htmlspecialchars(($sortie['utilisateur_prenom'] ?? '') . ' ' . ($sortie['utilisateur_nom'] ?? '')); ?></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Date de sortie</div>
                <div class="detail-value"><?php echo date('d/m/Y H:i', strtotime($sortie['date_sortie'])); ?></div>
            </div>
            <div class="detail-item" style="grid-column: span 1;">
                <div class="detail-label">Observation / Motif</div>
                <div class="detail-value"><?php echo htmlspecialchars($sortie['observation'] ?? '—'); ?></div>
            </div>
        </div>
    </div>
</div>
