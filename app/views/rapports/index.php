<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon yellow">
            <i data-lucide="bar-chart-3" style="width:24px;height:24px;"></i>
        </div>
        <div>
            <h1 class="page-title">Rapports</h1>
            <p class="page-subtitle">Consultez les rapports et statistiques de votre stock</p>
        </div>
    </div>
</div>

<?php if (!empty($stock_summary)): ?>
    <div class="row g-4 mb-4">
        <div class="col-sm-6">
            <div class="kpi-card kpi-blue">
                <div class="kpi-icon blue">
                    <i data-lucide="cpu" style="width:24px;height:24px;"></i>
                </div>
                <div class="kpi-content">
                    <div class="kpi-label">Total équipements</div>
                    <div class="kpi-value"><?php echo $stock_summary['nombre_equipements'] ?? 0; ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="kpi-card kpi-green">
                <div class="kpi-icon green">
                    <i data-lucide="package" style="width:24px;height:24px;"></i>
                </div>
                <div class="kpi-content">
                    <div class="kpi-label">Quantité totale</div>
                    <div class="kpi-value"><?php echo $stock_summary['quantite_total'] ?? 0; ?></div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning mb-4">
        <i data-lucide="info" class="alert-icon"></i>
        <span>Aucune donnée de stock disponible</span>
    </div>
<?php endif; ?>

<div class="row g-4">
    <div class="col-md-6">
        <a href="<?php echo APP_URL; ?>/rapport/mouvements" class="rapport-card">
            <div class="rapport-card-icon" style="background:var(--primary-100);color:var(--primary-600);">
                <i data-lucide="arrow-left-right" style="width:24px;height:24px;"></i>
            </div>
            <div>
                <div class="rapport-card-title">Mouvements de stock</div>
                <div class="rapport-card-desc">Entrées et sorties de matériel</div>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="<?php echo APP_URL; ?>/rapport/alertes_historique" class="rapport-card">
            <div class="rapport-card-icon" style="background:var(--warning-light);color:var(--warning-dark);">
                <i data-lucide="history" style="width:24px;height:24px;"></i>
            </div>
            <div>
                <div class="rapport-card-title">Historique des alertes</div>
                <div class="rapport-card-desc">Toutes les alertes passées et actives</div>
            </div>
        </a>
    </div>
</div>
