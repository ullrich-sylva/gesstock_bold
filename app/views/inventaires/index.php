<h2>Inventaires</h2>

<div class="mb-3">
    <a href="<?php echo APP_URL; ?>/inventaire/create" class="btn btn-primary">Créer un inventaire</a>
</div>

<?php if (!empty($inventaires)): ?>
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
                <?php foreach ($inventaires as $i): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($i['reference']); ?></td>
                        <td><?php echo htmlspecialchars($i['utilisateur_nom'] ?? ''); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($i['date_inventaire'])); ?></td>
                        <td>
                            <a href="<?php echo APP_URL; ?>/inventaire/<?php echo $i['id']; ?>" class="btn btn-sm btn-info">Voir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-info">Aucun inventaire trouvé</div>
<?php endif; ?>
