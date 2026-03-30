<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BOLD STOCK - Système professionnel de gestion de stock d'équipements électriques">
    <title><?php echo $pageTitle ?? APP_NAME; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo APP_URL; ?>/public/css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
    <?php include APP_PATH . '/views/partials/navbar.php'; ?>
    
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    
    <?php include APP_PATH . '/views/partials/sidebar.php'; ?>
    
    <main>
        <?php include APP_PATH . '/views/partials/alerts.php'; ?>
        <?php echo $content; ?>
    </main>
    
    <?php include APP_PATH . '/views/partials/footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="<?php echo APP_URL; ?>/public/js/app.js"></script>
</body>
</html>
