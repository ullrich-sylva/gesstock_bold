<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon slate">
            <i data-lucide="truck" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Bons de livraison</h1>
            <p class="page-subtitle">Suivi des livraisons</p>
        </div>
    </div>
    <a href="<?php echo APP_URL; ?>/bon-livraison/create" class="btn btn-primary">
        <i data-lucide="plus" style="width:16px;height:16px;"></i> Créer un bon
    </a>
</div>

<?php if (!empty($bons)): ?>
    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>N° Bon</th>
                        <th>Fournisseur</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bons as $b): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($b['numero_bon']); ?></strong></td>
                            <td><?php echo htmlspecialchars($b['fournisseur_nom'] ?? '—'); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($b['date_livraison'])); ?></td>
                            <td class="text-end">
                                <a href="<?php echo APP_URL; ?>/bon-livraison/<?php echo $b['id_bon']; ?>" class="btn btn-sm btn-outline-primary" title="Voir">
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
            <i data-lucide="truck" style="width:28px;height:28px;"></i>
        </div>
        <div class="empty-state-title">Aucun bon</div>
        <div class="empty-state-text">Créez votre premier bon de livraison</div>
        <a href="<?php echo APP_URL; ?>/bon-livraison/create" class="btn btn-primary">
            <i data-lucide="plus" style="width:16px;height:16px;"></i> Créer un bon
        </a>
    </div>
<?php endif; ?>
