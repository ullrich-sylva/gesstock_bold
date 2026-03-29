<h2>Tableau de bord</h2>

<div class="row my-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Équipements</h5>
                <p class="card-text display-4"><?php echo $total_equipements ?? 0; ?></p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title">Stock faible</h5>
                <p class="card-text display-4"><?php echo count($low_stock_equipements ?? []); ?></p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h5 class="card-title">Alertes actives</h5>
                <p class="card-text display-4"><?php echo count($active_alerts ?? []); ?></p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Catégories</h5>
                <p class="card-text display-4"><?php echo count($categories ?? []); ?></p>
            </div>
            <div class="card-body">
                <h5 class="card-title">Équipements</h5>
                <p class="card-text display-4"><?php echo $total_equipements; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h5 class="card-title">Alertes</h5>
                <p class="card-text display-4"><?php echo count($active_alerts); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title">Stock faible</h5>
                <p class="card-text display-4"><?php echo count($low_stock_equipements); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">Catégories</h5>
                <p class="card-text display-4"><?php echo count($categories); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Alertes actives</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($active_alerts)): ?>
                    <ul class="list-group">
                        <?php foreach (array_slice($active_alerts, 0, 5) as $alert): ?>
                            <li class="list-group-item">
                                <strong><?php echo htmlspecialchars($alert['equipement_nom']); ?></strong><br>
                                <small><?php echo htmlspecialchars($alert['message']); ?></small>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?php echo APP_URL; ?>/alerte" class="btn btn-sm btn-link mt-2">Voir toutes les alertes</a>
                <?php else: ?>
                    <p class="text-muted">Aucune alerte active</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Stock faible</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($low_stock_equipements)): ?>
                    <ul class="list-group">
                        <?php foreach (array_slice($low_stock_equipements, 0, 5) as $equipement): ?>
                            <li class="list-group-item">
                                <strong><?php echo htmlspecialchars($equipement['nom']); ?></strong><br>
                                <small>Quantité: <?php echo $equipement['quantite_stock']; ?> (Seuil: <?php echo $equipement['seuil_alerte']; ?>)</small>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?php echo APP_URL; ?>/equipement" class="btn btn-sm btn-link mt-2">Voir tous les équipements</a>
                <?php else: ?>
                    <p class="text-muted">Aucun équipement en stock faible</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
