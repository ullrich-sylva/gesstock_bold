<h2>Éditer la demande</h2>

<form method="POST" action="<?php echo APP_URL; ?>/demande-materiel/<?php echo $demande['id']; ?>/update">
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"><?php echo htmlspecialchars($demande['description'] ?? ''); ?></textarea>
    </div>
    <div class="mb-3">
        <label for="statut" class="form-label">Statut</label>
        <select class="form-control" id="statut" name="statut" required>
            <option value="en_attente" <?php echo $demande['statut'] === 'en_attente' ? 'selected' : ''; ?>>En attente</option>
            <option value="approuvee" <?php echo $demande['statut'] === 'approuvee' ? 'selected' : ''; ?>>Approuvée</option>
            <option value="rejetee" <?php echo $demande['statut'] === 'rejetee' ? 'selected' : ''; ?>>Rejetée</option>
            <option value="livree" <?php echo $demande['statut'] === 'livree' ? 'selected' : ''; ?>>Livrée</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
    <a href="<?php echo APP_URL; ?>/demande-materiel" class="btn btn-secondary">Annuler</a>
</form>
