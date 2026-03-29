<h2>Éditer la catégorie</h2>

<form method="POST" action="<?php echo APP_URL; ?>/categorie/<?php echo $category['id']; ?>/update">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom *</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($category['nom']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"><?php echo htmlspecialchars($category['description'] ?? ''); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
    <a href="<?php echo APP_URL; ?>/categorie" class="btn btn-secondary">Annuler</a>
</form>
