<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon blue">
            <i data-lucide="clipboard-check" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Inventaires</h1>
            <p class="page-subtitle">Historique des inventaires réalisés</p>
        </div>
    </div>
    <a href="<?php echo APP_URL; ?>/inventaire/create" class="btn btn-primary">
        <i data-lucide="plus" style="width:16px;height:16px;"></i> Créer un inventaire
    </a>
</div>

<?php if (!empty($inventaires)): ?>
    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Référence</th>
                        <th>Utilisateur</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inventaires as $i): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($i['observation'] ?? '—'); ?></td>
                            <td><?php echo htmlspecialchars(($i['utilisateur_prenom'] ?? '') . ' ' . ($i['utilisateur_nom'] ?? '')); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($i['date_inventaire'])); ?></td>
                            <td class="text-end">
                                <a href="<?php echo APP_URL; ?>/inventaire/<?php echo $i['id_inventaire']; ?>" class="btn btn-sm btn-outline-primary" title="Voir">
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
            <i data-lucide="clipboard-check" style="width:28px;height:28px;"></i>
        </div>
        <div class="empty-state-title">Aucun inventaire</div>
        <div class="empty-state-text">Réalisez votre premier inventaire</div>
        <a href="<?php echo APP_URL; ?>/inventaire/create" class="btn btn-primary">
            <i data-lucide="plus" style="width:16px;height:16px;"></i> Créer un inventaire
        </a>
    </div>
<?php endif; ?>
