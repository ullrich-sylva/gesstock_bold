<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon slate">
            <i data-lucide="building-2" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Fournisseurs</h1>
            <p class="page-subtitle">Gérez vos contacts fournisseurs</p>
        </div>
    </div>
    <a href="<?php echo APP_URL; ?>/fournisseur/create" class="btn btn-primary">
        <i data-lucide="plus" style="width:16px;height:16px;"></i> Ajouter un fournisseur
    </a>
</div>

<?php if (!empty($fournisseurs)): ?>
    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Contact</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fournisseurs as $f): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($f['nom']); ?></strong></td>
                            <td><?php echo htmlspecialchars($f['contact'] ?? '—'); ?></td>
                            <td><?php echo htmlspecialchars($f['telephone'] ?? '—'); ?></td>
                            <td><?php echo htmlspecialchars($f['email'] ?? '—'); ?></td>
                            <td class="text-end">
                                <div class="action-btns justify-content-end">
                                    <a href="<?php echo APP_URL; ?>/fournisseur/<?php echo $f['id_fournisseur']; ?>/edit" class="btn btn-sm btn-outline-primary" title="Éditer">
                                        <i data-lucide="edit" style="width:14px;height:14px;"></i>
                                    </a>
                                    <form method="POST" action="<?php echo APP_URL; ?>/fournisseur/<?php echo $f['id_fournisseur']; ?>/delete" style="display:inline;">
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce fournisseur ?')" title="Supprimer">
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
            <i data-lucide="building-2" style="width:28px;height:28px;"></i>
        </div>
        <div class="empty-state-title">Aucun fournisseur</div>
        <div class="empty-state-text">Ajoutez votre premier fournisseur</div>
        <a href="<?php echo APP_URL; ?>/fournisseur/create" class="btn btn-primary">
            <i data-lucide="plus" style="width:16px;height:16px;"></i> Ajouter un fournisseur
        </a>
    </div>
<?php endif; ?>
