<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon yellow">
            <i data-lucide="history" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Historique des alertes</h1>
            <p class="page-subtitle">Toutes les alertes passées et actives</p>
        </div>
    </div>
    <a href="<?php echo APP_URL; ?>/rapport" class="btn btn-secondary">
        <i data-lucide="arrow-left" style="width:16px;height:16px;"></i> Retour
    </a>
</div>

<?php if (!empty($alertes)): ?>
    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Équipement</th>
                        <th>Type</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alertes as $a): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($a['equipement_nom'] ?? '—'); ?></strong></td>
                            <td><span class="badge bg-warning"><?php echo htmlspecialchars($a['type']); ?></span></td>
                            <td><?php echo htmlspecialchars($a['message']); ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($a['date_creation'])); ?></td>
                            <td><span class="badge <?php echo $a['statut'] === 'active' ? 'bg-danger' : 'bg-secondary'; ?>"><?php echo $a['statut']; ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php else: ?>
    <div class="empty-state">
        <div class="empty-state-icon">
            <i data-lucide="check-circle" style="width:28px;height:28px;"></i>
        </div>
        <div class="empty-state-title">Aucune alerte</div>
        <div class="empty-state-text">Aucune alerte trouvée dans l'historique</div>
    </div>
<?php endif; ?>
