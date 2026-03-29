<h2>Éditer l'équipement</h2>

<form method="POST" action="<?php echo APP_URL; ?>/equipement/<?php echo $equipement['id']; ?>/update">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom *</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($equipement['nom']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="categorie_id" class="form-label">Catégorie *</label>
        <select class="form-control" id="categorie_id" name="categorie_id" required>
            <?php foreach ($categories as $cat): ?>
                <option value="<?php echo $cat['id']; ?>" <?php echo $eq uipement['categorie_id'] == $cat['id'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($cat['nom']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"><?php echo htmlspecialchars($equipement['description'] ?? ''); ?></textarea>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="quantite_stock" class="form-label">Quantité stock</label>
                <input type="number" class="form-control" id="quantite_stock" name="quantite_stock" value="<?php echo $equipement['quantite_stock']; ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="seuil_alerte" class="form-label">Seuil alerte</label>
                <input type="number" class="form-control" id="seuil_alerte" name="seuil_alerte" value="<?php echo $equipement['seuil_alerte']; ?>">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="prix_unitaire" class="form-label">Prix unitaire</label>
        <input type="number" class="form-control" id="prix_unitaire" name="prix_unitaire" step="0.01" value="<?php echo $equipement['prix_unitaire']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
    <a href="<?php echo APP_URL; ?>/equipement" class="btn btn-secondary">Annuler</a>
</form>
