<h2>Rapports</h2>

<div class="row mb-4">
    <div class="col-md-12">
        <h4>Résumé du stock</h4>
        <?php if (!empty($stock_summary)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Catégorie</th>
                            <th>Nombre d'équipements</th>
                            <th>Quantité totale</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stock_summary as $s): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($s['categorie'] ?? 'Sans catégorie'); ?></td>
                                <td><?php echo $s['nombre_equipements']; ?></td>
                                <td><?php echo $s['quantite_total']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info">Aucune donnée disponible</div>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="btn-group" role="group">
            <a href="<?php echo APP_URL; ?>/rapport/mouvements" class="btn btn-primary">Mouvements</a>
            <a href="<?php echo APP_URL; ?>/rapport/alertes_historique" class="btn btn-warning">Historique alertes</a>
        </div>
    </div>
</div>
