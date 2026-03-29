<h2><?php echo htmlspecialchars($sortie['reference']); ?></h2>

<div class="card">
    <div class="card-body">
        <p><strong>Référence:</strong> <?php echo htmlspecialchars($sortie['reference']); ?></p>
        <p><strong>Date:</strong> <?php echo date('d/m/Y', strtotime($sortie['date_sortie'])); ?></p>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($sortie['description'] ?? ''); ?></p>
        
        <a href="<?php echo APP_URL; ?>/sortie-stock" class="btn btn-secondary">Retour</a>
    </div>
</div>
