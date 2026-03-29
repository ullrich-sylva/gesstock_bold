<h2><?php echo htmlspecialchars($bon['reference']); ?></h2>

<div class="card">
    <div class="card-body">
        <p><strong>Référence:</strong> <?php echo htmlspecialchars($bon['reference']); ?></p>
        <p><strong>Date:</strong> <?php echo date('d/m/Y', strtotime($bon['date_livraison'])); ?></p>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($bon['description'] ?? ''); ?></p>
        
        <a href="<?php echo APP_URL; ?>/bon-livraison" class="btn btn-secondary">Retour</a>
    </div>
</div>
