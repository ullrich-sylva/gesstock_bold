<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon green">
            <i data-lucide="plus-circle" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Créer une entrée de stock</h1>
            <p class="page-subtitle">Enregistrez une nouvelle réception de matériel</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo APP_URL; ?>/entree-stock">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="reference" class="form-label">Référence <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="reference" name="reference" placeholder="ENT-2024-001" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="fournisseur_id" class="form-label">Fournisseur <span class="text-danger">*</span></label>
                        <select class="form-select" id="fournisseur_id" name="fournisseur_id" required>
                            <option value="">— Sélectionner un fournisseur —</option>
                            <?php foreach ($fournisseurs as $f): ?>
                                <option value="<?php echo $f['id_fournisseur']; ?>"><?php echo htmlspecialchars($f['nom']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Détails de l'entrée..."></textarea>
            </div>
            <div class="d-flex gap-2 pt-3" style="border-top:1px solid var(--border-color);">
                <button type="submit" class="btn btn-primary">
                    <i data-lucide="check" style="width:16px;height:16px;"></i> Créer l'entrée
                </button>
                <a href="<?php echo APP_URL; ?>/entree-stock" class="btn btn-secondary">
                    <i data-lucide="x" style="width:16px;height:16px;"></i> Annuler
                </a>
            </div>
        </form>
    </div>
</div>
