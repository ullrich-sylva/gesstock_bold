<?php
$flashes = getFlash();
?>
<?php if (!empty($flashes)): ?>
    <?php foreach ($flashes as $type => $messages): ?>
        <?php 
        $alertClass = $type === 'error' ? 'danger' : $type;
        $iconName = 'info';
        switch ($alertClass) {
            case 'success': $iconName = 'check-circle-2'; break;
            case 'danger': $iconName = 'x-circle'; break;
            case 'warning': $iconName = 'alert-triangle'; break;
            case 'info': $iconName = 'info'; break;
        }
        ?>
        <?php if (is_array($messages)): ?>
            <?php foreach ($messages as $message): ?>
                <div class="alert alert-<?php echo $alertClass; ?> alert-dismissible fade show" role="alert">
                    <i data-lucide="<?php echo $iconName; ?>" class="alert-icon"></i>
                    <span><?php echo htmlspecialchars($message); ?></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-<?php echo $alertClass; ?> alert-dismissible fade show" role="alert">
                <i data-lucide="<?php echo $iconName; ?>" class="alert-icon"></i>
                <span><?php echo htmlspecialchars($messages); ?></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
