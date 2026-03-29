<h2>Entrées de stock</h2>

<div class="mb-3">
    <a href="<?php echo APP_URL; ?>/entree-stock/create" class="btn btn-primary">Créer une entrée</a>
</div>

<?php if (!empty($entrees)): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Fournisseur</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entrees as $e): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($e['reference']); ?></td>
                        <td><?php echo htmlspecialchars($e['fournisseur_nom'] ?? ''); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($e['date_entree'])); ?></td>
                        <td>
                            <a href="<?php echo APP_URL; ?>/entree-stock/<?php echo $e['id']; ?>" class="btn btn-sm btn-info">Voir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-info">Aucune entrée trouvée</div>
<?php endif; ?>
