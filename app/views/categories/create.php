<h2>Ajouter une catégorie</h2>

<form method="POST" action="<?php echo APP_URL; ?>/categorie">
    <div class="mb-3">
        <label for="libelle" class="form-label">Libellé *</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
    <a href="<?php echo APP_URL; ?>/categorie" class="btn btn-secondary">Annuler</a>
</form>
