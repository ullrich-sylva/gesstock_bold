<?php

// ============================================================
// GUIDE D'UTILISATION - GesStock Bold
// ============================================================

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GesStock Bold - Guide</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .section { margin: 20px 0; padding: 15px; border-left: 4px solid #667eea; }
        code { background: #f5f5f5; padding: 2px 5px; }
        pre { background: #f5f5f5; padding: 10px; overflow-x: auto; }
        h1, h2 { color: #667eea; }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>

<h1>✅ GesStock Bold - Application Complète</h1>

<div class="section">
    <h2>1. Configuration Requise</h2>
    <ul>
        <li><strong>PHP 7.4+</strong> avec PDO MySQL</li>
        <li><strong>MySQL 5.7+</strong></li>
        <li><strong>Apache</strong> avec mod_rewrite activé</li>
    </ul>
</div>

<div class="section">
    <h2>2. Installation de la Base de Données</h2>
    <pre>1. Ouvrir phpMyAdmin
2. Créer une db: "gesstock_bold"
3. Importer le fichier: <b>database.sql</b>
4. Vérifier les 13 tables créées</pre>
</div>

<div class="section">
    <h2>3. Configuration du Fichier Database</h2>
    <p>Éditer <code>/config/database.php</code>:</p>
    <pre>define('DB_HOST', 'localhost');
define('DB_NAME', 'gesstock_bold');
define('DB_USER', 'root');        // Votre utilisateur MySQL
define('DB_PASS', '');            // Votre mot de passe
define('DB_CHARSET', 'utf8mb4');</pre>
</div>

<div class="section">
    <h2>4. Identifiants d'Accès</h2>
    <p>Un utilisateur administrateur a été créé:</p>
    <ul>
        <li><strong>Email:</strong> admin@bold.com</li>
        <li><strong>Login:</strong> admin</li>
        <li><strong>Mot de passe:</strong> Voir dans la BD table utilisateur</li>
        <li><strong>Role:</strong> administrateur</li>
    </ul>
    <p class="error">⚠️ Vous pouvez créer d'autres utilisateurs depuis l'interface!</p>
</div>

<div class="section">
    <h2>5. Structure Complète</h2>
    <pre>GestionStock_bold/
├── index.php                     [Point d'entrée]
├── .htaccess                      [URL Rewriting]
├── config/
│   ├── constants.php             [Constantes]
│   ├── database.php              [Configuration BD]
│   └── session.php               [Gestion sessions]
├── core/
│   ├── Auth.php                  [Authentification]
│   ├── Router.php                [Routeur]
│   ├── Request.php               [Requête]
│   ├── Response.php              [Réponse]
│   ├── Session.php               [Sessions]
│   └── Validator.php             [Validation]
├── app/
│   ├── controllers/              [14 Contrôleurs]
│   ├── models/                   [14 Modèles]
│   └── views/                    [Vues]
├── helpers/
│   ├── functions.php
│   ├── security.php
│   └── pagination.php
└── public/
    ├── css/bootstrap.min.css
    ├── css/style.css
    ├── js/bootstrap.bundle.min.js
    └── js/app.js</pre>
</div>

<div class="section">
    <h2>6. Fonctionnalités Implémentées</h2>
    <ul>
        <li>✅ Authentification (Login/Register)</li>
        <li>✅ Gestion des catégories</li>
        <li>✅ Gestion des équipements</li>
        <li>✅ Gestion des fournisseurs</li>
        <li>✅ Entrées/Sorties de stock</li>
        <li>✅ Demandes de matériel</li>
        <li>✅ Bons de livraison</li>
        <li>✅ Alertes stock</li>
        <li>✅ Inventaires</li>
        <li>✅ Gestion utilisateurs (Admin)</li>
        <li>✅ Rapports et statistiques</li>
    </ul>
</div>

<div class="section">
    <h2>7. Routes Principales</h2>
    <pre>/auth/login                 Connexion
/auth/register              Inscription
/dashboard                  Tableau de bord
/categorie                  Gestion catégories
/equipement                 Gestion équipements
/fournisseur                Gestion fournisseurs
/entree-stock               Entrées stock
/sortie-stock               Sorties stock
/demande-materiel           Demandes matériel
/bon-livraison              Bons livraison
/inventaire                 Inventaires
/alerte                     Alertes
/rapport                    Rapports
/utilisateur                Gestion utilisateurs (Admin)</pre>
</div>

<div class="section">
    <h2>8. Vues à Compléter (Optionnel)</h2>
    <p>Les vues suivantes ont des templates de base et peuvent être enrichies:</p>
    <ul>
        <li>Rapports détaillés (mouvements, alertes)</li>
        <li>Dashboards personnalisés</li>
        <li>Exports PDF/Excel</li>
        <li>Graphiques statistiques</li>
    </ul>
</div>

<div class="section">
    <h2>9. Encodage des Données</h2>
    <ul>
        <li>Tous les inputs HTML sont échappés (htmlspecialchars)</li>
        <li>Les mots de passe sont hashés avec PASSWORD_BCRYPT</li>
        <li>Validation côté serveur automatique</li>
        <li>CSRF protection préparée dans Session</li>
    </ul>
</div>

<div class="section">
    <h2>10. Prochaines Étapes</h2>
    <ol>
        <li>Vérifier que Apache et MySQL tournent</li>
        <li>Importer la BD desde le fichier SQL</li>
        <li>Configurer <code>/config/database.php</code></li>
        <li>Accéder à <code>http://localhost/GestionStock_bold/</code></li>
        <li>Se connecter avec admin@bold.com</li>
        <li>Tester les fonctionnalités</li>
    </ol>
</div>

<hr>
<p style="text-align: center; color: #999;">
    <strong>GesStock Bold v1.0</strong> - Système de Gestion de Stock Équipements Électriques
</p>

</body>
</html>
