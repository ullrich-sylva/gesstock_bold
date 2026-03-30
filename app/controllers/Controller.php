<?php

class Controller {
    protected $request;
    protected $response;
    
    public function __construct(Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;
    }
    
    // Vérifier si l'utilisateur est authentifié
    protected function requireAuth() {
        if (!Auth::isAuthenticated()) {
            $this->response->redirect('/auth/login');
        }
    }
    
    // Vérifier si l'utilisateur est admin
    protected function requireAdmin() {
        if (!Auth::isAdmin()) {
            $this->response->setStatusCode(403);
            $this->response->render('errors/403');
            exit;
        }
    }
    
    // Vérifier si l'utilisateur est gestionnaire ou admin
    protected function requireGestionnaire() {
        if (!Auth::hasAnyRole(['admin', 'gestionnaire'])) {
            $this->response->setStatusCode(403);
            $this->response->render('errors/403');
            exit;
        }
    }
    
    // Vérifier si l'utilisateur est magasinier, gestionnaire ou admin
    protected function requireMagasinier() {
        if (!Auth::hasAnyRole(['admin', 'gestionnaire', 'magasinier'])) {
            $this->response->setStatusCode(403);
            $this->response->render('errors/403');
            exit;
        }
    }
    
    // Redirection avec message
    protected function redirectWithMessage($path, $type, $message) {
        setFlash($type, $message);
        $this->response->redirect($path);
    }
    
    // Envoyer JSON
    protected function json($data) {
        $this->response->json($data);
    }
}
