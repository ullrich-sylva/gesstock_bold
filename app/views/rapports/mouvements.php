<h2>Mouvements de stock</h2>

<div class="mb-3">
    <form method="GET" class="row g-2">
        <div class="col-md-4">
            <input type="date" class="form-control" name="start_date" value="<?php echo htmlspecialchars($start_date); ?>">
        </div>
        <div class="col-md-4">
            <input type="date" class="form-control" name="end_date" value="<?php echo htmlspecialchars($end_date); ?>">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary w-100">Filtrer</button>
        </div>
    </form>
</div>

<?php if (!empty($mouvements)): ?>
    <div class="table-responsive">
        <table class="table table-striped">
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
                        <td><span class="badge bg-<?php echo $m['type'] === 'entree' ? 'success' : 'danger'; ?>"><?php echo ucfirst($m['type']); ?></span></td>
                        <td><?php echo htmlspecialchars($m['reference'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($m['fournisseur_nom'] ?? $m['utilisateur_nom'] ?? ''); ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($m['date'] ?? $m['date_entree'] ?? $m['date_sortie'])); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-info">Aucun mouvement trouvé</div>
<?php endif; ?>
