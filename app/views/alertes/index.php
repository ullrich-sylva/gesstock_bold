<h2>Alertes</h2>

<?php if (!empty($alertes)): ?>
    <div class="table-responsive">
        <table class="table table-striped">
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
                        <td><?php echo htmlspecialchars($a['equipement_nom'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($a['type']); ?></td>
                        <td><?php echo htmlspecialchars($a['message']); ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($a['date_creation'])); ?></td>
                        <td><span class="badge bg-warning"><?php echo $a['statut']; ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-info">Aucune alerte active</div>
<?php endif; ?>
