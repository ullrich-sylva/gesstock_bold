<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon green">
            <i data-lucide="edit" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Éditer la catégorie</h1>
            <p class="page-subtitle">Modifiez les informations de la catégorie</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo APP_URL; ?>/categorie/<?php echo $category['id_categorie']; ?>/update">
            <div class="mb-3">
                <label for="libelle" class="form-label">Libellé <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="libelle" name="libelle" value="<?php echo htmlspecialchars($category['libelle']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4"><?php echo htmlspecialchars($category['description'] ?? ''); ?></textarea>
            </div>
            <div class="d-flex gap-2 pt-3" style="border-top:1px solid var(--border-color);">
                <button type="submit" class="btn btn-primary">
                    <i data-lucide="check" style="width:16px;height:16px;"></i> Mettre à jour
                </button>
                <a href="<?php echo APP_URL; ?>/categorie" class="btn btn-secondary">
                    <i data-lucide="x" style="width:16px;height:16px;"></i> Annuler
                </a>
            </div>
        </form>
    </div>
</div>
