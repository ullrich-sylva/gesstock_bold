<h2>Créer un bon de livraison</h2>

<form method="POST" action="<?php echo APP_URL; ?>/bon-livraison">
    <div class="mb-3">
        <label for="reference" class="form-label">Référence *</label>
        <input type="text" class="form-control" id="reference" name="reference" required>
    </div>
    <div class="mb-3">
        <label for="demandemateriel_id" class="form-label">Demande matériel</label>
        <input type="number" class="form-control" id="demandemateriel_id" name="demandemateriel_id">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
    <a href="<?php echo APP_URL; ?>/bon-livraison" class="btn btn-secondary">Annuler</a>
</form>
