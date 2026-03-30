<?php

// Constantes d'application
define('APP_NAME', 'Gestion Stock Équipements');
define('APP_VERSION', '1.0.0');
define('APP_URL', 'http://localhost/GestionStock_bold');
define('APP_DEBUG', true);

// Constantes de chemins
define('ROOT_PATH', dirname(dirname(__FILE__)));
define('APP_PATH', ROOT_PATH . '/app');
define('CONFIG_PATH', ROOT_PATH . '/config');
define('CORE_PATH', ROOT_PATH . '/core');
define('HELPERS_PATH', ROOT_PATH . '/helpers');
define('PUBLIC_PATH', ROOT_PATH . '/public');

// Permissions
define('ROLE_ADMIN', 'admin');
define('ROLE_GESTIONNAIRE', 'gestionnaire');
define('ROLE_MAGASINIER', 'magasinier');

// Messages
define('MSG_SUCCESS', 'Opération réussie!');
define('MSG_ERROR', 'Une erreur est survenue!');
define('MSG_DELETED', 'Élément supprimé avec succès!');
define('MSG_CREATED', 'Élément créé avec succès!');
define('MSG_UPDATED', 'Élément modifié avec succès!');
