<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon blue">
            <i data-lucide="cpu" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Équipements</h1>
            <p class="page-subtitle">Gérez votre inventaire d'équipements</p>
        </div>
    </div>
    <a href="<?php echo APP_URL; ?>/equipement/create" class="btn btn-primary">
        <i data-lucide="plus" style="width:16px;height:16px;"></i> Ajouter un équipement
    </a>
</div>

<?php if (!empty($equipements)): ?>
    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Référence</th>
                        <th>Désignation</th>
                        <th>Catégorie</th>
                        <th>Stock</th>
                        <th>Seuil min/max</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($equipements as $eq): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($eq['reference']); ?></strong></td>
                            <td><?php echo htmlspecialchars($eq['designation']); ?></td>
                            <td><?php echo htmlspecialchars($eq['categorie_nom'] ?? 'N/A'); ?></td>
                            <td>
                                <span class="badge <?php echo ($eq['stock_actuel'] <= $eq['seuil_min'] ? 'bg-danger' : 'bg-success'); ?>">
                                    <?php echo $eq['stock_actuel']; ?>
                                </span>
                            </td>
                            <td><?php echo $eq['seuil_min']; ?> / <?php echo $eq['seuil_max']; ?></td>
                            <td class="text-end">
                                <div class="action-btns justify-content-end">
                                    <a href="<?php echo APP_URL; ?>/equipement/<?php echo $eq['id_equipement']; ?>" class="btn btn-sm btn-outline-primary" title="Voir">
                                        <i data-lucide="eye" style="width:14px;height:14px;"></i>
                                    </a>
                                    <a href="<?php echo APP_URL; ?>/equipement/<?php echo $eq['id_equipement']; ?>/edit" class="btn btn-sm btn-outline-primary" title="Éditer">
                                        <i data-lucide="edit" style="width:14px;height:14px;"></i>
                                    </a>
                                    <form method="POST" action="<?php echo APP_URL; ?>/equipement/<?php echo $eq['id_equipement']; ?>/delete" style="display:inline;">
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet équipement ?')" title="Supprimer">
                                            <i data-lucide="trash-2" style="width:14px;height:14px;"></i>
                                        </button>
                                    </form>
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
            <i data-lucide="cpu" style="width:28px;height:28px;"></i>
        </div>
        <div class="empty-state-title">Aucun équipement</div>
        <div class="empty-state-text">Commencez par ajouter votre premier équipement</div>
        <a href="<?php echo APP_URL; ?>/equipement/create" class="btn btn-primary">
            <i data-lucide="plus" style="width:16px;height:16px;"></i> Ajouter un équipement
        </a>
    </div>
<?php endif; ?>
