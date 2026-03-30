<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon slate">
            <i data-lucide="plus-circle" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Ajouter un fournisseur</h1>
            <p class="page-subtitle">Enregistrez un nouveau fournisseur</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo APP_URL; ?>/fournisseur">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom du fournisseur" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email@fournisseur.com">
                    </div>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="+237 6XX XXX XXX">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Personne à contacter">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <textarea class="form-control" id="adresse" name="adresse" rows="3" placeholder="Adresse du fournisseur"></textarea>
            </div>
            <div class="d-flex gap-2 pt-3" style="border-top:1px solid var(--border-color);">
                <button type="submit" class="btn btn-primary">
                    <i data-lucide="check" style="width:16px;height:16px;"></i> Créer le fournisseur
                </button>
                <a href="<?php echo APP_URL; ?>/fournisseur" class="btn btn-secondary">
                    <i data-lucide="x" style="width:16px;height:16px;"></i> Annuler
                </a>
            </div>
        </form>
    </div>
</div>
