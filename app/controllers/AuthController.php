<?php

require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/models/UtilisateurModel.php';

class AuthController extends Controller {
    private $userModel;
    private $auth;
    
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        $this->userModel = new UtilisateurModel();
        $this->auth = new Auth();
    }
    
    public function login() {
        if ($this->request->getMethod() === 'POST') {
            $email = $this->request->post('email');
            $password = $this->request->post('password');
            
            $result = $this->auth->login($email, $password);
            
            if ($result['success']) {
                $this->response->redirect('/dashboard');
            } else {
                setFlash('error', $result['message']);
                $this->response->authView('auth/login');
            }
        } else {
            $this->response->authView('auth/login');
        }
    }
    
    public function register() {
        if ($this->request->getMethod() === 'POST') {
            $email = $this->request->post('email');
            $nom = $this->request->post('nom');
            $prenom = $this->request->post('prenom');
            $password = $this->request->post('password');
            $password_confirm = $this->request->post('password_confirmation');
            
            // Validation
            if (empty($email) || empty($nom) || empty($prenom) || empty($password)) {
                setFlash('error', 'Tous les champs sont requis');
                $this->response->authView('auth/register');
                return;
            }
            
            if ($password !== $password_confirm) {
                setFlash('error', 'Les mots de passe ne correspondent pas');
                $this->response->authView('auth/register');
                return;
            }
            
            if (strlen($password) < 6) {
                setFlash('error', 'Le mot de passe doit contenir au moins 6 caractères');
                $this->response->authView('auth/register');
                return;
            }
            
            $result = $this->auth->register($email, $nom, $prenom, $password);
            
            if ($result['success']) {
                setFlash('success', 'Inscription réussie! Veuillez vous connecter.');
                $this->response->redirect('/auth/login');
            } else {
                setFlash('error', $result['message']);
                $this->response->authView('auth/register');
            }
        } else {
            $this->response->authView('auth/register');
        }
    }
    
    public function logout() {
        logout();
        setFlash('success', 'Vous avez été déconnecté');
        $this->response->redirect('/auth/login');
    }
}
