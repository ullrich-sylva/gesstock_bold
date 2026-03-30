<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon blue">
            <i data-lucide="cpu" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title"><?php echo htmlspecialchars($equipement['designation']); ?></h1>
            <p class="page-subtitle">Détails de l'équipement</p>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="<?php echo APP_URL; ?>/equipement/<?php echo $equipement['id_equipement']; ?>/edit" class="btn btn-primary">
            <i data-lucide="edit" style="width:16px;height:16px;"></i> Éditer
        </a>
        <a href="<?php echo APP_URL; ?>/equipement" class="btn btn-secondary">
            <i data-lucide="arrow-left" style="width:16px;height:16px;"></i> Retour
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="detail-grid">
            <div class="detail-item">
                <div class="detail-label">Référence</div>
                <div class="detail-value"><?php echo htmlspecialchars($equipement['reference']); ?></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Description</div>
                <div class="detail-value"><?php echo htmlspecialchars($equipement['description'] ?? '—'); ?></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Quantité en stock</div>
                <div class="detail-value">
                    <span class="badge <?php echo ($equipement['stock_actuel'] <= ($equipement['seuil_min'] ?? 0)) ? 'bg-danger' : 'bg-success'; ?>">
                        <?php echo $equipement['stock_actuel']; ?> <?php echo htmlspecialchars($equipement['unite'] ?? ''); ?>
                    </span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Seuil d'alerte (Min)</div>
                <div class="detail-value"><?php echo $equipement['seuil_min']; ?></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Seuil Max</div>
                <div class="detail-value"><?php echo $equipement['seuil_max'] ?? '—'; ?></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Catégorie</div>
                <div class="detail-value"><?php echo htmlspecialchars($equipement['categorie_nom'] ?? '—'); ?></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Date d'ajout</div>
                <div class="detail-value"><?php echo date('d/m/Y', strtotime($equipement['date_ajout'])); ?></div>
            </div>
        </div>
    </div>
</div>
