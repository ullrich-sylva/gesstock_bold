<h2>Utilisateurs</h2>

<div class="mb-3">
    <a href="<?php echo APP_URL; ?>/utilisateur/create" class="btn btn-primary">Ajouter un utilisateur</a>
</div>

<?php if (!empty($utilisateurs)): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateurs as $u): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($u['nom']); ?></td>
                        <td><?php echo htmlspecialchars($u['prenom']); ?></td>
                        <td><?php echo htmlspecialchars($u['email']); ?></td>
                        <td><span class="badge bg-secondary"><?php echo $u['role']; ?></span></td>
                        <td><span class="badge bg-<?php echo $u['actif'] ? 'success' : 'danger'; ?>"><?php echo $u['actif'] ? 'Actif' : 'Inactif'; ?></span></td>
                        <td>
                            <a href="<?php echo APP_URL; ?>/utilisateur/<?php echo $u['id']; ?>/edit" class="btn btn-sm btn-warning">Éditer</a>
                            <a href="<?php echo APP_URL; ?>/utilisateur/<?php echo $u['id']; ?>/delete" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-info">Aucun utilisateur trouvé</div>
<?php endif; ?>
