<?php

// ============================================================
// Point d'entrée de l'application
// ============================================================

// Déclaration des constantes
define('ROOT_DIR', __DIR__);

/**
 * Autoloader simple pour charger les classes
 */
spl_autoload_register(function($class) {
    $paths = [
        ROOT_DIR . '/app/controllers/',
        ROOT_DIR . '/app/models/',
        ROOT_DIR . '/core/',
    ];
    
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Charger la configuration
require_once ROOT_DIR . '/config/constants.php';
require_once ROOT_DIR . '/config/session.php';
require_once ROOT_DIR . '/config/database.php';

// Charger les helpers
require_once ROOT_DIR . '/helpers/functions.php';
require_once ROOT_DIR . '/helpers/security.php';
require_once ROOT_DIR . '/helpers/pagination.php';

// Charger les classes principales
require_once ROOT_DIR . '/core/Request.php';
require_once ROOT_DIR . '/core/Response.php';
require_once ROOT_DIR . '/core/Router.php';
require_once ROOT_DIR . '/core/Auth.php';
require_once ROOT_DIR . '/core/Session.php';
require_once ROOT_DIR . '/core/Validator.php';

// Créer les instances
$request = new Request();
$response = new Response();
$router = new Router($request, $response);

// ============================================================
// Définir les routes
// ============================================================

// Routes d'authentification
$router->get('/auth/login', 'Auth@login');
$router->post('/auth/login', 'Auth@login');
$router->get('/auth/register', 'Auth@register');
$router->post('/auth/register', 'Auth@register');
$router->get('/auth/logout', 'Auth@logout');

// Routes du dashboard
$router->get('/dashboard', 'Dashboard@index');
$router->get('/', 'Dashboard@redirect');

// Routes des catégories
$router->get('/categorie', 'Categorie@index');
$router->get('/categorie/create', 'Categorie@create');
$router->post('/categorie', 'Categorie@store');
$router->get('/categorie/{id}', 'Categorie@show');
$router->get('/categorie/{id}/edit', 'Categorie@edit');
$router->post('/categorie/{id}/update', 'Categorie@update');
$router->post('/categorie/{id}/delete', 'Categorie@delete');

// Routes des équipements
$router->get('/equipement', 'Equipement@index');
$router->get('/equipement/create', 'Equipement@create');
$router->post('/equipement', 'Equipement@store');
$router->get('/equipement/{id}', 'Equipement@show');
$router->get('/equipement/{id}/edit', 'Equipement@edit');
$router->post('/equipement/{id}/update', 'Equipement@update');
$router->post('/equipement/{id}/delete', 'Equipement@delete');

// Routes des fournisseurs
$router->get('/fournisseur', 'Fournisseur@index');
$router->get('/fournisseur/create', 'Fournisseur@create');
$router->post('/fournisseur', 'Fournisseur@store');
$router->get('/fournisseur/{id}/edit', 'Fournisseur@edit');
$router->post('/fournisseur/{id}/update', 'Fournisseur@update');
$router->post('/fournisseur/{id}/delete', 'Fournisseur@delete');

// Routes des entrées de stock
$router->get('/entree-stock', 'EntreeStock@index');
$router->get('/entree-stock/create', 'EntreeStock@create');
$router->post('/entree-stock', 'EntreeStock@store');
$router->get('/entree-stock/{id}', 'EntreeStock@show');

// Routes des sorties de stock
$router->get('/sortie-stock', 'SortieStock@index');
$router->get('/sortie-stock/create', 'SortieStock@create');
$router->post('/sortie-stock', 'SortieStock@store');
$router->get('/sortie-stock/{id}', 'SortieStock@show');

// Routes des demandes de matériel
$router->get('/demande-materiel', 'DemandeMateriel@index');
$router->get('/demande-materiel/create', 'DemandeMateriel@create');
$router->post('/demande-materiel', 'DemandeMateriel@store');
$router->get('/demande-materiel/{id}', 'DemandeMateriel@show');
$router->get('/demande-materiel/{id}/edit', 'DemandeMateriel@edit');
$router->post('/demande-materiel/{id}/update', 'DemandeMateriel@update');

// Routes des bons de livraison
$router->get('/bon-livraison', 'BonLivraison@index');
$router->get('/bon-livraison/create', 'BonLivraison@create');
$router->post('/bon-livraison', 'BonLivraison@store');
$router->get('/bon-livraison/{id}', 'BonLivraison@show');

// Routes des alertes
$router->get('/alerte', 'Alerte@index');

// Routes des inventaires
$router->get('/inventaire', 'Inventaire@index');
$router->get('/inventaire/create', 'Inventaire@create');
$router->post('/inventaire', 'Inventaire@store');
$router->get('/inventaire/{id}', 'Inventaire@show');

// Routes des utilisateurs
$router->get('/utilisateur', 'Utilisateur@index');
$router->get('/utilisateur/create', 'Utilisateur@create');
$router->post('/utilisateur', 'Utilisateur@store');
$router->get('/utilisateur/{id}/edit', 'Utilisateur@edit');
$router->post('/utilisateur/{id}/update', 'Utilisateur@update');
$router->post('/utilisateur/{id}/delete', 'Utilisateur@delete');

// Routes des rapports
$router->get('/rapport', 'Rapport@index');
$router->get('/rapport/mouvements', 'Rapport@mouvements');
$router->get('/rapport/alertes_historique', 'Rapport@alertes_historique');

// ============================================================
// Dispatcher la requête
// ============================================================
$router->dispatch();
