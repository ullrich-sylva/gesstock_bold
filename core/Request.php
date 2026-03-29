<?php

class Request {
    private $method;
    private $path;
    private $get;
    private $post;
    private $files;
    
    public function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->path = str_replace('/GestionStock_bold', '', $this->path);
        $this->get = $_GET;
        $this->post = $_POST;
        $this->files = $_FILES;
    }
    
    public function getMethod() {
        return $this->method;
    }
    
    public function getPath() {
        return $this->path;
    }
    
    public function get($key, $default = null) {
        return $this->get[$key] ?? $default;
    }
    
    public function post($key, $default = null) {
        return $this->post[$key] ?? $default;
    }
    
    public function input($key, $default = null) {
        return $this->post[$key] ?? $this->get[$key] ?? $default;
    }
    
    public function all() {
        return array_merge($this->get, $this->post);
    }
    
    public function file($key) {
        return $this->files[$key] ?? null;
    }
    
    public function hasFile($key) {
        return isset($this->files[$key]) && $this->files[$key]['error'] === UPLOAD_ERR_OK;
    }
    
    public function getFullUrl() {
        return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    }
    
    public function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }
}
