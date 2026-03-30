<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon blue">
            <i data-lucide="arrow-left-right" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Mouvements de stock</h1>
            <p class="page-subtitle">Entrées et sorties de matériel</p>
        </div>
    </div>
    <a href="<?php echo APP_URL; ?>/rapport" class="btn btn-secondary">
        <i data-lucide="arrow-left" style="width:16px;height:16px;"></i> Retour
    </a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label">Date début</label>
                <input type="date" class="form-control" name="start_date" value="<?php echo htmlspecialchars($start_date); ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Date fin</label>
                <input type="date" class="form-control" name="end_date" value="<?php echo htmlspecialchars($end_date); ?>">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">
                    <i data-lucide="filter" style="width:16px;height:16px;"></i> Filtrer
                </button>
            </div>
        </form>
    </div>
</div>

<?php if (!empty($mouvements)): ?>
    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Référence</th>
                        <th>Source</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mouvements as $m): ?>
                        <tr>
                            <td><span class="badge <?php echo $m['type'] === 'entree' ? 'bg-success' : 'bg-danger'; ?>"><?php echo ucfirst($m['type']); ?></span></td>
                            <td><strong><?php echo htmlspecialchars($m['reference'] ?? '—'); ?></strong></td>
                            <td><?php echo htmlspecialchars($m['fournisseur_nom'] ?? $m['utilisateur_nom'] ?? '—'); ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($m['date'] ?? $m['date_entree'] ?? $m['date_sortie'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php else: ?>
    <div class="empty-state">
        <div class="empty-state-icon">
            <i data-lucide="arrow-left-right" style="width:28px;height:28px;"></i>
        </div>
        <div class="empty-state-title">Aucun mouvement</div>
        <div class="empty-state-text">Aucun mouvement trouvé pour la période sélectionnée</div>
    </div>
<?php endif; ?>
