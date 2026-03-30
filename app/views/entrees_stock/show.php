<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon green">
            <i data-lucide="package-plus" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title"><?php echo htmlspecialchars($entree['reference']); ?></h1>
            <p class="page-subtitle">Détails de l'entrée de stock</p>
        </div>
    </div>
    <a href="<?php echo APP_URL; ?>/entree-stock" class="btn btn-secondary">
        <i data-lucide="arrow-left" style="width:16px;height:16px;"></i> Retour
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="detail-grid">
            <div class="detail-item">
                <div class="detail-label">Référence</div>
                <div class="detail-value"><?php echo htmlspecialchars($entree['reference']); ?></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Date d'entrée</div>
                <div class="detail-value"><?php echo date('d/m/Y', strtotime($entree['date_entree'])); ?></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Description</div>
                <div class="detail-value"><?php echo htmlspecialchars($entree['description'] ?? '—'); ?></div>
            </div>
        </div>
    </div>
</div>
