<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon blue">
            <i data-lucide="plus-circle" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Ajouter un équipement</h1>
            <p class="page-subtitle">Enregistrez un nouvel équipement dans le stock</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo APP_URL; ?>/equipement">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="reference" class="form-label">Référence <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="reference" name="reference" placeholder="EQ-2024-001" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="designation" class="form-label">Désignation <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="designation" name="designation" placeholder="Ex: Câble électrique 2.5mm" required>
                    </div>
                </div>
            </div>
            
            <div class="row g-3">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="id_categorie" class="form-label">Catégorie <span class="text-danger">*</span></label>
                        <select class="form-select" id="id_categorie" name="id_categorie" required>
                            <option value="">— Sélectionner une catégorie —</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?php echo $cat['id_categorie']; ?>"><?php echo htmlspecialchars($cat['libelle']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="unite" class="form-label">Unité <span class="text-danger">*</span></label>
                        <select class="form-select" id="unite" name="unite" required>
                            <option value="Pièce" selected>Pièce</option>
                            <option value="Mètre">Mètre</option>
                            <option value="Kg">Kg</option>
                            <option value="Litre">Litre</option>
                            <option value="Rouleau">Rouleau</option>
                            <option value="Boîte">Boîte</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="stock_actuel" class="form-label">Stock actuel</label>
                        <input type="number" class="form-control" id="stock_actuel" name="stock_actuel" value="0" min="0">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="seuil_min" class="form-label">Seuil minimum</label>
                        <input type="number" class="form-control" id="seuil_min" name="seuil_min" value="5" min="0">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="seuil_max" class="form-label">Seuil maximum</label>
                        <input type="number" class="form-control" id="seuil_max" name="seuil_max" value="100" min="0">
                    </div>
                </div>
            </div>
            
            <div class="d-flex gap-2 pt-3" style="border-top:1px solid var(--border-color);">
                <button type="submit" class="btn btn-primary">
                    <i data-lucide="check" style="width:16px;height:16px;"></i> Créer l'équipement
                </button>
                <a href="<?php echo APP_URL; ?>/equipement" class="btn btn-secondary">
                    <i data-lucide="x" style="width:16px;height:16px;"></i> Annuler
                </a>
            </div>
        </form>
    </div>
</div>
