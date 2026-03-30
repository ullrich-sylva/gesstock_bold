<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Connexion à BOLD STOCK - Gestion de stock d'équipements électriques">
    <title>Authentification - <?php echo APP_NAME; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo APP_URL; ?>/public/css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>
<body class="auth-wrapper">
    <div class="auth-container">
        <div class="auth-logo">
            <img src="<?php echo APP_URL; ?>/public/img/logo.png" alt="Bold Logo" class="auth-logo-img">
            <div class="auth-logo-subtitle">Gestion Stock Électrique</div>
        </div>
        
        <?php include APP_PATH . '/views/partials/alerts.php'; ?>
        
        <?php echo $content; ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</body>
</html>
