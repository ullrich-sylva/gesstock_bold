<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon red">
            <i data-lucide="plus-circle" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Créer une sortie de stock</h1>
            <p class="page-subtitle">Enregistrez une nouvelle sortie de matériel</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo APP_URL; ?>/sortie-stock">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="reference" class="form-label">Référence (N° Bon) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="reference" name="reference" placeholder="SOR-2024-001" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="id_equipement" class="form-label">Équipement <span class="text-danger">*</span></label>
                        <select class="form-select" id="id_equipement" name="id_equipement" required>
                            <option value="">— Sélectionner un équipement —</option>
                            <?php foreach ($equipements as $e): ?>
                                <option value="<?php echo $e['id_equipement']; ?>">
                                    <?php echo htmlspecialchars($e['designation']); ?> (Stock: <?php echo $e['stock_actuel']; ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="quantite" class="form-label">Quantité <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="quantite" name="quantite" min="1" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Observation / Motif</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Détails de la sortie..."></textarea>
            </div>
            
            <div class="d-flex gap-2 pt-3" style="border-top:1px solid var(--border-color);">
                <button type="submit" class="btn btn-primary">
                    <i data-lucide="check" style="width:16px;height:16px;"></i> Créer la sortie
                </button>
                <a href="<?php echo APP_URL; ?>/sortie-stock" class="btn btn-secondary">
                    <i data-lucide="x" style="width:16px;height:16px;"></i> Annuler
                </a>
            </div>
        </form>
    </div>
</div>
