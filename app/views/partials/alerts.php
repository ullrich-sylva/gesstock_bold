<?php
$flashes = getFlash();
?>
<?php if (!empty($flashes)): ?>
    <?php foreach ($flashes as $type => $messages): ?>
        <?php if (is_array($messages)): ?>
            <?php foreach ($messages as $message): ?>
                <div class="alert alert-<?php echo $type === 'error' ? 'danger' : $type; ?> alert-dismissible fade show" role="alert">
                    <?php echo htmlspecialchars($message); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-<?php echo $type === 'error' ? 'danger' : $type; ?> alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($messages); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
