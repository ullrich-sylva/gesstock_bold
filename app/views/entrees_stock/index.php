<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon green">
            <i data-lucide="package-plus" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Entrées de stock</h1>
            <p class="page-subtitle">Historique des réceptions de matériel</p>
        </div>
    </div>
    <a href="<?php echo APP_URL; ?>/entree-stock/create" class="btn btn-primary">
        <i data-lucide="plus" style="width:16px;height:16px;"></i> Créer une entrée
    </a>
</div>

<?php if (!empty($entrees)): ?>
    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Référence</th>
                        <th>Fournisseur</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($entrees as $e): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($e['reference']); ?></strong></td>
                            <td><?php echo htmlspecialchars($e['fournisseur_nom'] ?? '—'); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($e['date_entree'])); ?></td>
                            <td class="text-end">
                                <a href="<?php echo APP_URL; ?>/entree-stock/<?php echo $e['id_entree']; ?>" class="btn btn-sm btn-outline-primary" title="Voir">
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
            <i data-lucide="package-plus" style="width:28px;height:28px;"></i>
        </div>
        <div class="empty-state-title">Aucune entrée</div>
        <div class="empty-state-text">Enregistrez votre première entrée de stock</div>
        <a href="<?php echo APP_URL; ?>/entree-stock/create" class="btn btn-primary">
            <i data-lucide="plus" style="width:16px;height:16px;"></i> Créer une entrée
        </a>
    </div>
<?php endif; ?>
