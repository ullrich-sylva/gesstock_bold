<h2><?php echo htmlspecialchars($inventaire['reference']); ?></h2>

<div class="card">
    <div class="card-body">
        <p><strong>Référence:</strong> <?php echo htmlspecialchars($inventaire['reference']); ?></p>
        <p><strong>Date:</strong> <?php echo date('d/m/Y', strtotime($inventaire['date_inventaire'])); ?></p>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($inventaire['description'] ?? ''); ?></p>
        
        <a href="<?php echo APP_URL; ?>/inventaire" class="btn btn-secondary">Retour</a>
    </div>
</div>
