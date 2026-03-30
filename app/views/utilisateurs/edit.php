<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon slate">
            <i data-lucide="edit" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Éditer l'utilisateur</h1>
            <p class="page-subtitle">Modifiez les informations de l'utilisateur</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo APP_URL; ?>/utilisateur/<?php echo $utilisateur['id_utilisateur']; ?>/update">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo htmlspecialchars($utilisateur['prenom']); ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($utilisateur['nom']); ?>">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Rôle</label>
                <select class="form-select" id="role" name="role">
                    <option value="magasinier" <?php echo $utilisateur['role'] === 'magasinier' ? 'selected' : ''; ?>>Magasinier</option>
                    <option value="gestionnaire" <?php echo $utilisateur['role'] === 'gestionnaire' ? 'selected' : ''; ?>>Gestionnaire de stock</option>
                    <option value="admin" <?php echo $utilisateur['role'] === 'admin' ? 'selected' : ''; ?>>Administrateur</option>
                </select>
            </div>
            <div class="d-flex gap-2 pt-3" style="border-top:1px solid var(--border-color);">
                <button type="submit" class="btn btn-primary">
                    <i data-lucide="check" style="width:16px;height:16px;"></i> Mettre à jour
                </button>
                <a href="<?php echo APP_URL; ?>/utilisateur" class="btn btn-secondary">
                    <i data-lucide="x" style="width:16px;height:16px;"></i> Annuler
                </a>
            </div>
        </form>
    </div>
</div>
