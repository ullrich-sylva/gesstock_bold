<?php
$alertes = $active_alerts ?? [];
?>
<div class="badge bg-danger">
    <i class="bi bi-exclamation-triangle"></i> <?php echo count($alertes); ?> alertes
</div>
