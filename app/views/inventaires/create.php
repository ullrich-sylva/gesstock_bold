<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon blue">
            <i data-lucide="plus-circle" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Créer un inventaire</h1>
            <p class="page-subtitle">Lancez un nouvel inventaire</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo APP_URL; ?>/inventaire">
            <div class="mb-3">
                <label for="reference" class="form-label">Référence <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="reference" name="reference" placeholder="INV-2024-001" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Notes sur l'inventaire..."></textarea>
            </div>
            <div class="d-flex gap-2 pt-3" style="border-top:1px solid var(--border-color);">
                <button type="submit" class="btn btn-primary">
                    <i data-lucide="check" style="width:16px;height:16px;"></i> Créer l'inventaire
                </button>
                <a href="<?php echo APP_URL; ?>/inventaire" class="btn btn-secondary">
                    <i data-lucide="x" style="width:16px;height:16px;"></i> Annuler
                </a>
            </div>
        </form>
    </div>
</div>
