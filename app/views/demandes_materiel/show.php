<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon cyan">
            <i data-lucide="clipboard-list" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title"><?php echo htmlspecialchars($demande['motif'] ?: 'DEM-' . $demande['id_demande']); ?></h1>
            <p class="page-subtitle">Détails de la demande de matériel</p>
        </div>
    </div>
    <div class="d-flex gap-2">
        <a href="<?php echo APP_URL; ?>/demande-materiel/<?php echo $demande['id_demande']; ?>/edit" class="btn btn-primary">
            <i data-lucide="edit" style="width:16px;height:16px;"></i> Éditer
        </a>
        <a href="<?php echo APP_URL; ?>/demande-materiel" class="btn btn-secondary">
            <i data-lucide="arrow-left" style="width:16px;height:16px;"></i> Retour
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="detail-grid">
            <div class="detail-item">
                <div class="detail-label">Motif / Référence</div>
                <div class="detail-value"><?php echo htmlspecialchars($demande['motif'] ?: 'DEM-' . $demande['id_demande']); ?></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Statut</div>
                <div class="detail-value"><span class="badge bg-info"><?php echo $demande['statut']; ?></span></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Date de demande</div>
                <div class="detail-value"><?php echo date('d/m/Y', strtotime($demande['date_demande'])); ?></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Observation</div>
                <div class="detail-value"><?php echo htmlspecialchars($demande['observation'] ?? '—'); ?></div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Technicien</div>
                <div class="detail-value"><?php echo htmlspecialchars(($demande['technicien_prenom'] ?? '') . ' ' . ($demande['technicien_nom'] ?? '')); ?></div>
            </div>
        </div>
    </div>
</div>
