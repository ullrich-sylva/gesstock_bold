<h2><?php echo htmlspecialchars($entree['reference']); ?></h2>

<div class="card">
    <div class="card-body">
        <p><strong>Référence:</strong> <?php echo htmlspecialchars($entree['reference']); ?></p>
        <p><strong>Date:</strong> <?php echo date('d/m/Y', strtotime($entree['date_entree'])); ?></p>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($entree['description'] ?? ''); ?></p>
        
        <a href="<?php echo APP_URL; ?>/entree-stock" class="btn btn-secondary">Retour</a>
    </div>
</div>
