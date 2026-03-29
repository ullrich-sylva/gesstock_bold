<h2>Bons de livraison</h2>

<div class="mb-3">
    <a href="<?php echo APP_URL; ?>/bon-livraison/create" class="btn btn-primary">Créer un bon</a>
</div>

<?php if (!empty($bons)): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Demande</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bons as $b): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($b['reference']); ?></td>
                        <td><?php echo htmlspecialchars($b['demande_ref'] ?? ''); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($b['date_livraison'])); ?></td>
                        <td>
                            <a href="<?php echo APP_URL; ?>/bon-livraison/<?php echo $b['id']; ?>" class="btn btn-sm btn-info">Voir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-info">Aucun bon trouvé</div>
<?php endif; ?>
