<?php ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification - <?php echo APP_NAME; ?></title>
    <link href="<?php echo APP_URL; ?>/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo APP_URL; ?>/public/css/style.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .auth-container {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <h2 class="text-center mb-4"><?php echo APP_NAME; ?></h2>
        
        <?php include APP_PATH . '/views/partials/alerts.php'; ?>
        
        <?php echo $content; ?>
    </div>
    
    <script src="<?php echo APP_URL; ?>/public/js/bootstrap.bundle.min.js"></script>
</body>
</html>
