<?php

class Session {
    
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }
    
    public static function get($key, $default = null) {
        return $_SESSION[$key] ?? $default;
    }
    
    public static function has($key) {
        return isset($_SESSION[$key]);
    }
    
    public static function forget($key) {
        unset($_SESSION[$key]);
    }
    
    public static function flush() {
        $_SESSION = [];
    }
    
    public static function all() {
        return $_SESSION;
    }
    
    public static function flash($type, $message) {
        setFlash($type, $message);
    }
    
    public static function getFlash($type = null) {
        return getFlash($type);
    }
}
