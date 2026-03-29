<h2>Catégories</h2>

<div class="mb-3">
    <a href="<?php echo APP_URL; ?>/categorie/create" class="btn btn-primary">Ajouter une catégorie</a>
</div>

<?php if (!empty($categories)): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $cat): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($cat['libelle']); ?></td>
                        <td><?php echo htmlspecialchars(substr($cat['description'] ?? '', 0, 50)); ?>...</td>
                        <td>
                            <a href="<?php echo APP_URL; ?>/categorie/<?php echo $cat['id_categorie']; ?>/edit" class="btn btn-sm btn-warning">Éditer</a>
                            <form method="POST" action="<?php echo APP_URL; ?>/categorie/<?php echo $cat['id_categorie']; ?>/delete" style="display:inline;">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-info">Aucune catégorie trouvée</div>
<?php endif; ?>
