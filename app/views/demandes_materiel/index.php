<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon cyan">
            <i data-lucide="clipboard-list" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Demandes de matériel</h1>
            <p class="page-subtitle">Suivi des demandes d'équipement</p>
        </div>
    </div>
    <a href="<?php echo APP_URL; ?>/demande-materiel/create" class="btn btn-primary">
        <i data-lucide="plus" style="width:16px;height:16px;"></i> Créer une demande
    </a>
</div>

<?php if (!empty($demandes)): ?>
    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Motif / Réf</th>
                        <th>Technicien</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($demandes as $d): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($d['motif'] ?: 'DEM-' . $d['id_demande']); ?></strong></td>
                            <td><?php echo htmlspecialchars(($d['technicien_prenom'] ?? '') . ' ' . ($d['technicien_nom'] ?? '')); ?></td>
                            <td><span class="badge bg-info"><?php echo $d['statut']; ?></span></td>
                            <td><?php echo date('d/m/Y', strtotime($d['date_demande'])); ?></td>
                            <td class="text-end">
                                <div class="action-btns justify-content-end">
                                    <a href="<?php echo APP_URL; ?>/demande-materiel/<?php echo $d['id_demande']; ?>" class="btn btn-sm btn-outline-primary" title="Voir">
                                        <i data-lucide="eye" style="width:14px;height:14px;"></i>
                                    </a>
                                    <a href="<?php echo APP_URL; ?>/demande-materiel/<?php echo $d['id_demande']; ?>/edit" class="btn btn-sm btn-outline-primary" title="Éditer">
                                        <i data-lucide="edit" style="width:14px;height:14px;"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php else: ?>
    <div class="empty-state">
        <div class="empty-state-icon">
            <i data-lucide="clipboard-list" style="width:28px;height:28px;"></i>
        </div>
        <div class="empty-state-title">Aucune demande</div>
        <div class="empty-state-text">Créez votre première demande de matériel</div>
        <a href="<?php echo APP_URL; ?>/demande-materiel/create" class="btn btn-primary">
            <i data-lucide="plus" style="width:16px;height:16px;"></i> Créer une demande
        </a>
    </div>
<?php endif; ?>
