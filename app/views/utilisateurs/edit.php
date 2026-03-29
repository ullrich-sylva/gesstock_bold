<h2>Éditer l'utilisateur</h2>

<form method="POST" action="<?php echo APP_URL; ?>/utilisateur/<?php echo $utilisateur['id']; ?>/update">
    <div class="mb-3">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo htmlspecialchars($utilisateur['prenom']); ?>">
    </div>
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($utilisateur['nom']); ?>">
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Rôle</label>
        <select class="form-control" id="role" name="role">
            <option value="user" <?php echo $utilisateur['role'] === 'user' ? 'selected' : ''; ?>>Utilisateur</option>
            <option value="admin" <?php echo $utilisateur['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
    <a href="<?php echo APP_URL; ?>/utilisateur" class="btn btn-secondary">Annuler</a>
</form>
