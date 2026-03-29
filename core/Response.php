<?php

class Response {
    private $statusCode = 200;
    private $headers = [];
    private $data = [];
    
    public function setStatusCode($code) {
        $this->statusCode = $code;
        http_response_code($code);
        return $this;
    }
    
    public function setHeader($name, $value) {
        $this->headers[$name] = $value;
        header("{$name}: {$value}");
        return $this;
    }
    
    public function json($data) {
        $this->setHeader('Content-Type', 'application/json');
        echo json_encode($data);
        exit;
    }
    
    public function redirect($path) {
        header("Location: " . APP_URL . $path);
        exit;
    }
    
    public function render($view, $data = []) {
        $this->data = $data;
        $viewFile = APP_PATH . "/views/{$view}.php";
        
        if (!file_exists($viewFile)) {
            die("Erreur: La vue {$view} n'existe pas");
        }
        
        extract($data);
        require $viewFile;
    }
    
    public function layout($layout, $view, $data = []) {
        $layoutFile = APP_PATH . "/views/layouts/{$layout}.php";
        
        if (!file_exists($layoutFile)) {
            die("Erreur: Le layout {$layout} n'existe pas");
        }
        
        $viewFile = APP_PATH . "/views/{$view}.php";
        if (!file_exists($viewFile)) {
            die("Erreur: La vue {$view} n'existe pas");
        }
        
        $this->data = $data;
        extract($data);
        ob_start();
        require $viewFile;
        $content = ob_get_clean();
        
        require $layoutFile;
    }
    
    public function view($view, $data = []) {
        $this->layout('main', $view, $data);
    }
    
    public function authView($view, $data = []) {
        $this->layout('auth', $view, $data);
    }
    
    public function back() {
        $referer = $_SERVER['HTTP_REFERER'] ?? APP_URL . '/dashboard';
        header("Location: {$referer}");
        exit;
    }
}
