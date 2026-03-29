<h2>Éditer le fournisseur</h2>

<form method="POST" action="<?php echo APP_URL; ?>/fournisseur/<?php echo $fournisseur['id']; ?>/update">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom *</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($fournisseur['nom']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($fournisseur['email'] ?? ''); ?>">
    </div>
    <div class="mb-3">
        <label for="telephone" class="form-label">Téléphone</label>
        <input type="tel" class="form-control" id="telephone" name="telephone" value="<?php echo htmlspecialchars($fournisseur['telephone'] ?? ''); ?>">
    </div>
    <div class="mb-3">
        <label for="adresse" class="form-label">Adresse</label>
        <textarea class="form-control" id="adresse" name="adresse" rows="3"><?php echo htmlspecialchars($fournisseur['adresse'] ?? ''); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
    <a href="<?php echo APP_URL; ?>/fournisseur" class="btn btn-secondary">Annuler</a>
</form>
