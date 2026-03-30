<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon cyan">
            <i data-lucide="edit" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Éditer la demande</h1>
            <p class="page-subtitle">Modifiez les informations de la demande</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo APP_URL; ?>/demande-materiel/<?php echo $demande['id_demande']; ?>/update">
            <div class="mb-3">
                <label for="observation" class="form-label">Observation / Détails</label>
                <textarea class="form-control" id="observation" name="description" rows="3"><?php echo htmlspecialchars($demande['observation'] ?? ''); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="statut" class="form-label">Statut</label>
                <select class="form-select" id="statut" name="statut" required>
                    <option value="en_attente" <?php echo $demande['statut'] === 'en_attente' ? 'selected' : ''; ?>>En attente</option>
                    <option value="validee" <?php echo $demande['statut'] === 'validee' ? 'selected' : ''; ?>>Validée</option>
                    <option value="rejetee" <?php echo $demande['statut'] === 'rejetee' ? 'selected' : ''; ?>>Rejetée</option>
                </select>
            </div>
            <div class="d-flex gap-2 pt-3" style="border-top:1px solid var(--border-color);">
                <button type="submit" class="btn btn-primary">
                    <i data-lucide="check" style="width:16px;height:16px;"></i> Mettre à jour
                </button>
                <a href="<?php echo APP_URL; ?>/demande-materiel" class="btn btn-secondary">
                    <i data-lucide="x" style="width:16px;height:16px;"></i> Annuler
                </a>
            </div>
        </form>
    </div>
</div>
