<h2>Équipements</h2>

<div class="mb-3">
    <a href="<?php echo APP_URL; ?>/equipement/create" class="btn btn-primary">Ajouter un équipement</a>
</div>

<?php if (!empty($equipements)): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Désignation</th>
                    <th>Catégorie</th>
                    <th>Stock</th>
                    <th>Seuil min/max</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipements as $eq): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($eq['reference']); ?></td>
                        <td><?php echo htmlspecialchars($eq['designation']); ?></td>
                        <td><?php echo htmlspecialchars($eq['categorie_nom'] ?? 'N/A'); ?></td>
                        <td>
                            <span class="badge bg-<?php echo ($eq['stock_actuel'] <= $eq['seuil_min'] ? 'danger' : 'success'); ?>">
                                <?php echo $eq['stock_actuel']; ?>
                            </span>
                        </td>
                        <td><?php echo $eq['seuil_min']; ?> / <?php echo $eq['seuil_max']; ?></td>
                        <td>
                            <a href="<?php echo APP_URL; ?>/equipement/<?php echo $eq['id_equipement']; ?>" class="btn btn-sm btn-info">Voir</a>
                            <a href="<?php echo APP_URL; ?>/equipement/<?php echo $eq['id_equipement']; ?>/edit" class="btn btn-sm btn-warning">Éditer</a>
                            <form method="POST" action="<?php echo APP_URL; ?>/equipement/<?php echo $eq['id_equipement']; ?>/delete" style="display:inline;">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-info">Aucun équipement trouvé</div>
<?php endif; ?>
