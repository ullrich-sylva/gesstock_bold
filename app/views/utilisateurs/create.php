<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon slate">
            <i data-lucide="user-plus" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Ajouter un utilisateur</h1>
            <p class="page-subtitle">Créez un nouveau compte utilisateur</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo APP_URL; ?>/utilisateur">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Jean" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Dupont" required>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="jean@entreprise.com" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Rôle</label>
                <select class="form-select" id="role" name="role">
                    <option value="magasinier">Magasinier</option>
                    <option value="gestionnaire">Gestionnaire de stock</option>
                    <option value="admin">Administrateur</option>
                </select>
            </div>
            <div class="d-flex gap-2 pt-3" style="border-top:1px solid var(--border-color);">
                <button type="submit" class="btn btn-primary">
                    <i data-lucide="check" style="width:16px;height:16px;"></i> Créer l'utilisateur
                </button>
                <a href="<?php echo APP_URL; ?>/utilisateur" class="btn btn-secondary">
                    <i data-lucide="x" style="width:16px;height:16px;"></i> Annuler
                </a>
            </div>
        </form>
    </div>
</div>
