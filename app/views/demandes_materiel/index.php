<h2>Demandes de matériel</h2>

<div class="mb-3">
    <a href="<?php echo APP_URL; ?>/demande-materiel/create" class="btn btn-primary">Créer une demande</a>
</div>

<?php if (!empty($demandes)): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Utilisateur</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($demandes as $d): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($d['reference']); ?></td>
                        <td><?php echo htmlspecialchars($d['utilisateur_nom'] ?? ''); ?></td>
                        <td><span class="badge bg-info"><?php echo $d['statut']; ?></span></td>
                        <td><?php echo date('d/m/Y', strtotime($d['date_demande'])); ?></td>
                        <td>
                            <a href="<?php echo APP_URL; ?>/demande-materiel/<?php echo $d['id']; ?>" class="btn btn-sm btn-info">Voir</a>
                            <a href="<?php echo APP_URL; ?>/demande-materiel/<?php echo $d['id']; ?>/edit" class="btn btn-sm btn-warning">Éditer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-info">Aucune demande trouvée</div>
<?php endif; ?>
