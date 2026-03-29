<?php

// Configuration des sessions
// Durée de la session en secondes (1 heure)
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);

// Paramètres de sécurité des cookies
if (PHP_VERSION_ID >= 70300) {
    session_set_cookie_params([
        'lifetime' => 3600,
        'path' => '/',
        'domain' => '',
        'secure' => false,
        'httponly' => true,
        'samesite' => 'Strict'
    ]);
}

// Démarrer la session après la configuration
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Fonction pour définir un message flash
function setFlash($type, $message) {
    if (!isset($_SESSION['flash'])) {
        $_SESSION['flash'] = [];
    }
    $_SESSION['flash'][$type] = $message;
}

// Fonction pour obtenir et supprimer un message flash
function getFlash($type = null) {
    if ($type) {
        if (isset($_SESSION['flash'][$type])) {
            $message = $_SESSION['flash'][$type];
            unset($_SESSION['flash'][$type]);
            return $message;
        }
        return null;
    }
    
    $flashes = $_SESSION['flash'] ?? [];
    $_SESSION['flash'] = [];
    return $flashes;
}

// Fonction pour vérifier si l'utilisateur est connecté
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

// Fonction pour obtenir l'utilisateur actuel
function getCurrentUser() {
    return $_SESSION['user'] ?? null;
}

// Fonction pour définir l'utilisateur
function setUser($user) {
    $_SESSION['user'] = $user;
    $_SESSION['user_id'] = $user['id'] ?? null;
}

// Fonction de déconnexion
function logout() {
    unset($_SESSION['user']);
    unset($_SESSION['user_id']);
    session_destroy();
}
