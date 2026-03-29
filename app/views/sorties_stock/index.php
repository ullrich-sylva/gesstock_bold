<h2>Sorties de stock</h2>

<div class="mb-3">
    <a href="<?php echo APP_URL; ?>/sortie-stock/create" class="btn btn-primary">Créer une sortie</a>
</div>

<?php if (!empty($sorties)): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Utilisateur</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sorties as $s): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($s['reference']); ?></td>
                        <td><?php echo htmlspecialchars($s['utilisateur_nom'] ?? ''); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($s['date_sortie'])); ?></td>
                        <td>
                            <a href="<?php echo APP_URL; ?>/sortie-stock/<?php echo $s['id']; ?>" class="btn btn-sm btn-info">Voir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-info">Aucune sortie trouvée</div>
<?php endif; ?>
