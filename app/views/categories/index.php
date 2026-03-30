<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon green">
            <i data-lucide="folder-open" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Catégories</h1>
            <p class="page-subtitle">Organisez vos équipements par catégorie</p>
        </div>
    </div>
    <a href="<?php echo APP_URL; ?>/categorie/create" class="btn btn-primary">
        <i data-lucide="plus" style="width:16px;height:16px;"></i> Ajouter une catégorie
    </a>
</div>

<?php if (!empty($categories)): ?>
    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Libellé</th>
                        <th>Description</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $cat): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($cat['libelle']); ?></strong></td>
                            <td><span class="text-muted"><?php echo htmlspecialchars(substr($cat['description'] ?? 'N/A', 0, 60)); ?></span></td>
                            <td class="text-end">
                                <div class="action-btns justify-content-end">
                                    <a href="<?php echo APP_URL; ?>/categorie/<?php echo $cat['id_categorie']; ?>/edit" class="btn btn-sm btn-outline-primary" title="Éditer">
                                        <i data-lucide="edit" style="width:14px;height:14px;"></i>
                                    </a>
                                    <form method="POST" action="<?php echo APP_URL; ?>/categorie/<?php echo $cat['id_categorie']; ?>/delete" style="display:inline;">
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')" title="Supprimer">
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
            <i data-lucide="folder-open" style="width:28px;height:28px;"></i>
        </div>
        <div class="empty-state-title">Aucune catégorie</div>
        <div class="empty-state-text">Créez votre première catégorie pour organiser vos équipements</div>
        <a href="<?php echo APP_URL; ?>/categorie/create" class="btn btn-primary">
            <i data-lucide="plus" style="width:16px;height:16px;"></i> Créer une catégorie
        </a>
    </div>
<?php endif; ?>
