<h2><?php echo htmlspecialchars($equipement['nom']); ?></h2>

<div class="card">
    <div class="card-body">
        <p><strong>Référence:</strong> <?php echo htmlspecialchars($equipement['reference']); ?></p>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($equipement['description'] ?? ''); ?></p>
        <p><strong>Quantité stock:</strong> <?php echo $equipement['quantite_stock']; ?></p>
        <p><strong>Seuil alerte:</strong> <?php echo $equipement['seuil_alerte']; ?></p>
        <p><strong>Prix unitaire:</strong> <?php echo $equipement['prix_unitaire']; ?></p>
        
        <a href="<?php echo APP_URL; ?>/equipement/<?php echo $equipement['id']; ?>/edit" class="btn btn-warning">Éditer</a>
        <a href="<?php echo APP_URL; ?>/equipement" class="btn btn-secondary">Retour</a>
    </div>
</div>
