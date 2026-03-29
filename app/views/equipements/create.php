<h2>Ajouter un équipement</h2>

<form method="POST" action="<?php echo APP_URL; ?>/equipement">
    <div class="mb-3">
        <label for="reference" class="form-label">Référence *</label>
        <input type="text" class="form-control" id="reference" name="reference" required>
    </div>
    <div class="mb-3">
        <label for="nom" class="form-label">Nom *</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="mb-3">
        <label for="categorie_id" class="form-label">Catégorie *</label>
        <select class="form-control" id="categorie_id" name="categorie_id" required>
            <option value="">Sélectionner une catégorie</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['nom']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="quantite_stock" class="form-label">Quantité stock</label>
                <input type="number" class="form-control" id="quantite_stock" name="quantite_stock" value="0">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="seuil_alerte" class="form-label">Seuil alerte</label>
                <input type="number" class="form-control" id="seuil_alerte" name="seuil_alerte" value="10">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="prix_unitaire" class="form-label">Prix unitaire</label>
        <input type="number" class="form-control" id="prix_unitaire" name="prix_unitaire" step="0.01" value="0">
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
    <a href="<?php echo APP_URL; ?>/equipement" class="btn btn-secondary">Annuler</a>
</form>
