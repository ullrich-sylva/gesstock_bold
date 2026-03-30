<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon blue">
            <i data-lucide="layout-dashboard" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Tableau de bord</h1>
            <p class="page-subtitle">Vue d'ensemble de votre stock</p>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="kpi-card kpi-blue">
            <div class="kpi-icon blue">
                <i data-lucide="cpu" style="width:24px;height:24px;"></i>
            </div>
            <div class="kpi-content">
                <div class="kpi-label">Équipements</div>
                <div class="kpi-value"><?php echo $total_equipements ?? 0; ?></div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6 col-xl-3">
        <div class="kpi-card kpi-yellow">
            <div class="kpi-icon yellow">
                <i data-lucide="alert-triangle" style="width:24px;height:24px;"></i>
            </div>
            <div class="kpi-content">
                <div class="kpi-label">Stock faible</div>
                <div class="kpi-value"><?php echo count($low_stock_equipements ?? []); ?></div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6 col-xl-3">
        <div class="kpi-card kpi-red">
            <div class="kpi-icon red">
                <i data-lucide="bell-ring" style="width:24px;height:24px;"></i>
            </div>
            <div class="kpi-content">
                <div class="kpi-label">Alertes actives</div>
                <div class="kpi-value"><?php echo count($active_alerts ?? []); ?></div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6 col-xl-3">
        <div class="kpi-card kpi-green">
            <div class="kpi-icon green">
                <i data-lucide="folder-open" style="width:24px;height:24px;"></i>
            </div>
            <div class="kpi-content">
                <div class="kpi-label">Catégories</div>
                <div class="kpi-value"><?php echo count($categories ?? []); ?></div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <i data-lucide="bell-ring"></i>
                <h5>Alertes actives</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($active_alerts)): ?>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Équipement</th>
                                    <th>Message</th>
                                    <th class="text-end">Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (array_slice($active_alerts, 0, 5) as $alert): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="kpi-icon red" style="width:28px;height:28px;min-width:28px;">
                                                    <i data-lucide="alert-circle" style="width:14px;height:14px;"></i>
                                                </div>
                                                <span class="fw-bold"><?php echo htmlspecialchars($alert['equipement_nom']); ?></span>
                                            </div>
                                        </td>
                                        <td><small class="text-muted"><?php echo htmlspecialchars($alert['message']); ?></small></td>
                                        <td class="text-end"><span class="badge bg-danger">Active</span></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        <a href="<?php echo APP_URL; ?>/alerte" class="btn btn-sm btn-outline-primary">
                            <i data-lucide="arrow-right" style="width:14px;height:14px;"></i> Voir toutes les alertes
                        </a>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <i data-lucide="check-circle" style="width:28px;height:28px;"></i>
                        </div>
                        <div class="empty-state-title">Tout est en ordre</div>
                        <div class="empty-state-text">Aucune alerte active pour le moment</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <i data-lucide="alert-triangle"></i>
                <h5>Stock faible</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($low_stock_equipements)): ?>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Équipement</th>
                                    <th>Seuil</th>
                                    <th class="text-end">En Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (array_slice($low_stock_equipements, 0, 5) as $equipement): ?>
                                    <tr>
                                        <td><strong><?php echo htmlspecialchars($equipement['nom']); ?></strong></td>
                                        <td><?php echo $equipement['seuil_alerte']; ?></td>
                                        <td class="text-end">
                                            <span class="badge bg-danger"><?php echo $equipement['quantite_stock']; ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        <a href="<?php echo APP_URL; ?>/equipement" class="btn btn-sm btn-outline-primary">
                            <i data-lucide="arrow-right" style="width:14px;height:14px;"></i> Voir tous les équipements
                        </a>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <i data-lucide="package-check" style="width:28px;height:28px;"></i>
                        </div>
                        <div class="empty-state-title">Stock suffisant</div>
                        <div class="empty-state-text">Aucun équipement en stock faible</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
