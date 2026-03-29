<?php
$user = getCurrentUser();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?></title>
    <link href="<?php echo APP_URL; ?>/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo APP_URL; ?>/public/css/style.css" rel="stylesheet">
</head>
<body>
    <?php include APP_PATH . '/views/partials/navbar.php'; ?>
    
    <div class="container-fluid">
        <div class="row">
            <?php include APP_PATH . '/views/partials/sidebar.php'; ?>
            
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Tableau de bord</h1>
                </div>
                
                <?php include APP_PATH . '/views/partials/alerts.php'; ?>
                
                <?php echo $content; ?>
            </main>
        </div>
    </div>
    
    <?php include APP_PATH . '/views/partials/footer.php'; ?>
    
    <script src="<?php echo APP_URL; ?>/public/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo APP_URL; ?>/public/js/app.js"></script>
</body>
</html>
