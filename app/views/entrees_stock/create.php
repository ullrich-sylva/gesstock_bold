<h2>Créer une entrée de stock</h2>

<form method="POST" action="<?php echo APP_URL; ?>/entree-stock">
    <div class="mb-3">
        <label for="reference" class="form-label">Référence *</label>
        <input type="text" class="form-control" id="reference" name="reference" required>
    </div>
    <div class="mb-3">
        <label for="fournisseur_id" class="form-label">Fournisseur *</label>
        <select class="form-control" id="fournisseur_id" name="fournisseur_id" required>
            <option value="">Sélectionner un fournisseur</option>
            <?php foreach ($fournisseurs as $f): ?>
                <option value="<?php echo $f['id']; ?>"><?php echo htmlspecialchars($f['nom']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
    <a href="<?php echo APP_URL; ?>/entree-stock" class="btn btn-secondary">Annuler</a>
</form>
