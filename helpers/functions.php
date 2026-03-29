<?php

/**
 * Afficher et terminer
 */
function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

/**
 * Afficher de manière lisible
 */
function dump($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

/**
 * Obtenir une valeur d'un tableau imbriqué
 */
function array_get($array, $key, $default = null) {
    $keys = explode('.', $key);
    $value = $array;
    
    foreach ($keys as $key) {
        if (!is_array($value) || !isset($value[$key])) {
            return $default;
        }
        $value = $value[$key];
    }
    
    return $value;
}

/**
 * Convertir une chaîne en URL-friendly slug
 */
function slugify($text) {
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9]+/', '-', $text);
    return trim($text, '-');
}

/**
 * Formater une date
 */
function formatDate($date, $format = 'd/m/Y H:i') {
    return date($format, strtotime($date));
}

/**
 * Vérifier si une chaîne est vide
 */
function isEmpty($value) {
    return empty($value) || (is_string($value) && trim($value) === '');
}

/**
 * Obtenir la première lettre d'une chaîne
 */
function getInitials($text) {
    $parts = explode(' ', trim($text));
    return implode('', array_map(fn($part) => strtoupper($part[0] ?? ''), $parts));
}

/**
 * Générer une clé aléatoire
 */
function generateToken($length = 32) {
    return bin2hex(random_bytes($length / 2));
}

/**
 * Valider une adresse email
 */
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Obtenir l'URL actuel
 */
function currentUrl() {
    return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
}

/**
 * Redirection vers une URL
 */
function redirect($path) {
    header("Location: " . APP_URL . $path);
    exit;
}

/**
 * Convertir un nombre en devise
 */
function formatCurrency($amount, $currency = 'EUR') {
    return number_format($amount, 2, ',', ' ') . ' ' . $currency;
}

/**
 * Vérifier si l'utilisateur est authentifié
 */
function auth() {
    return isLoggedIn() ? getCurrentUser() : null;
}
