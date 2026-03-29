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
