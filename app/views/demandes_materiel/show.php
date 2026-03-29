<h2><?php echo htmlspecialchars($demande['reference']); ?></h2>

<div class="card">
    <div class="card-body">
        <p><strong>Référence:</strong> <?php echo htmlspecialchars($demande['reference']); ?></p>
        <p><strong>Statut:</strong> <span class="badge bg-info"><?php echo $demande['statut']; ?></span></p>
        <p><strong>Date:</strong> <?php echo date('d/m/Y', strtotime($demande['date_demande'])); ?></p>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($demande['description'] ?? ''); ?></p>
        
        <a href="<?php echo APP_URL; ?>/demande-materiel/<?php echo $demande['id']; ?>/edit" class="btn btn-warning">Éditer</a>
        <a href="<?php echo APP_URL; ?>/demande-materiel" class="btn btn-secondary">Retour</a>
    </div>
</div>
