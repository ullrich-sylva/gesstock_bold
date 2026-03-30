<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon slate">
            <i data-lucide="users" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Utilisateurs</h1>
            <p class="page-subtitle">Gestion des comptes utilisateurs</p>
        </div>
    </div>
    <a href="<?php echo APP_URL; ?>/utilisateur/create" class="btn btn-primary">
        <i data-lucide="user-plus" style="width:16px;height:16px;"></i> Ajouter un utilisateur
    </a>
</div>

<?php if (!empty($utilisateurs)): ?>
    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Statut</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($utilisateurs as $u): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($u['nom']); ?></strong></td>
                            <td><?php echo htmlspecialchars($u['prenom']); ?></td>
                            <td><?php echo htmlspecialchars($u['email']); ?></td>
                            <td><span class="badge bg-secondary"><?php echo ucfirst($u['role']); ?></span></td>
                            <td>
                                <span class="badge <?php echo $u['actif'] ? 'bg-success' : 'bg-danger'; ?>">
                                    <?php echo $u['actif'] ? 'Actif' : 'Inactif'; ?>
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="action-btns justify-content-end">
                                    <a href="<?php echo APP_URL; ?>/utilisateur/<?php echo $u['id_utilisateur']; ?>/edit" class="btn btn-sm btn-outline-primary" title="Éditer">
                                        <i data-lucide="edit-2" style="width:16px;height:16px;"></i>
                                    </a>
                                    <form method="POST" action="<?php echo APP_URL; ?>/utilisateur/<?php echo $u['id_utilisateur']; ?>/delete" style="display:inline;">
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirmDelete('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')" title="Supprimer">
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
            <i data-lucide="users" style="width:28px;height:28px;"></i>
        </div>
        <div class="empty-state-title">Aucun utilisateur</div>
        <div class="empty-state-text">Ajoutez le premier utilisateur du système</div>
        <a href="<?php echo APP_URL; ?>/utilisateur/create" class="btn btn-primary">
            <i data-lucide="user-plus" style="width:16px;height:16px;"></i> Ajouter un utilisateur
        </a>
    </div>
<?php endif; ?>
