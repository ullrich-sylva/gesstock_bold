<h2>Fournisseurs</h2>

<div class="mb-3">
    <a href="<?php echo APP_URL; ?>/fournisseur/create" class="btn btn-primary">Ajouter un fournisseur</a>
</div>

<?php if (!empty($fournisseurs)): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Contact</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fournisseurs as $f): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($f['nom']); ?></td>
                        <td><?php echo htmlspecialchars($f['contact'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($f['telephone'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($f['email'] ?? ''); ?></td>
                        <td>
                            <a href="<?php echo APP_URL; ?>/fournisseur/<?php echo $f['id_fournisseur']; ?>/edit" class="btn btn-sm btn-warning">Éditer</a>
                            <form method="POST" action="<?php echo APP_URL; ?>/fournisseur/<?php echo $f['id_fournisseur']; ?>/delete" style="display:inline;">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-info">Aucun fournisseur trouvé</div>
<?php endif; ?>
