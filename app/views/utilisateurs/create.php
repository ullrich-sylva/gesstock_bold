<h2>Ajouter un utilisateur</h2>

<form method="POST" action="<?php echo APP_URL; ?>/utilisateur">
    <div class="mb-3">
        <label for="prenom" class="form-label">Prénom *</label>
        <input type="text" class="form-control" id="prenom" name="prenom" required>
    </div>
    <div class="mb-3">
        <label for="nom" class="form-label">Nom *</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email *</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe *</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Rôle</label>
        <select class="form-control" id="role" name="role">
            <option value="user">Utilisateur</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
    <a href="<?php echo APP_URL; ?>/utilisateur" class="btn btn-secondary">Annuler</a>
</form>
