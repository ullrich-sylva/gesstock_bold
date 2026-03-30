<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon red">
            <i data-lucide="package-minus" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Sorties de stock</h1>
            <p class="page-subtitle">Historique des sorties de matériel</p>
        </div>
    </div>
    <a href="<?php echo APP_URL; ?>/sortie-stock/create" class="btn btn-primary">
        <i data-lucide="plus" style="width:16px;height:16px;"></i> Créer une sortie
    </a>
</div>

<?php if (!empty($sorties)): ?>
    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Référence</th>
                        <th>Équipement</th>
                        <th>Quantité</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sorties as $s): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($s['numero_bon'] ?? $s['reference'] ?? '—'); ?></strong></td>
                            <td><?php echo htmlspecialchars($s['equipement_nom'] ?? '—'); ?></td>
                            <td><?php echo htmlspecialchars($s['quantite'] ?? '0'); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($s['date_sortie'])); ?></td>
                            <td class="text-end">
                                <a href="<?php echo APP_URL; ?>/sortie-stock/<?php echo $s['id_sortie']; ?>" class="btn btn-sm btn-outline-primary" title="Voir">
                                    <i data-lucide="eye" style="width:14px;height:14px;"></i> Détails
                                </a>
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
            <i data-lucide="package-minus" style="width:28px;height:28px;"></i>
        </div>
        <div class="empty-state-title">Aucune sortie</div>
        <div class="empty-state-text">Enregistrez votre première sortie de stock</div>
        <a href="<?php echo APP_URL; ?>/sortie-stock/create" class="btn btn-primary">
            <i data-lucide="plus" style="width:16px;height:16px;"></i> Créer une sortie
        </a>
    </div>
<?php endif; ?>
