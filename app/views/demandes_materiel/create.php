<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon cyan">
            <i data-lucide="plus-circle" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Créer une demande de matériel</h1>
            <p class="page-subtitle">Formulaire de demande d'équipement</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo APP_URL; ?>/demande-materiel">
            <div class="mb-3">
                <label for="motif" class="form-label">Motif / Référence <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="motif" name="reference" placeholder="Ex: Panne de climatisation, Besoin de câbles..." required>
            </div>
            <div class="mb-3">
                <label for="observation" class="form-label">Observation / Détails</label>
                <textarea class="form-control" id="observation" name="description" rows="3" placeholder="Décrivez votre demande plus en détail..."></textarea>
            </div>
            <div class="d-flex gap-2 pt-3" style="border-top:1px solid var(--border-color);">
                <button type="submit" class="btn btn-primary">
                    <i data-lucide="check" style="width:16px;height:16px;"></i> Créer la demande
                </button>
                <a href="<?php echo APP_URL; ?>/demande-materiel" class="btn btn-secondary">
                    <i data-lucide="x" style="width:16px;height:16px;"></i> Annuler
                </a>
            </div>
        </form>
    </div>
</div>
