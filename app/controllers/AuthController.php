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
    
    public function forgotPassword() {
        $this->response->authView('auth/forgot_password');
    }
    
    public function sendResetLink() {
        $email = $this->request->post('email');
        $user = $this->userModel->findByEmail($email);
        
        if ($user) {
            $token = bin2hex(random_bytes(32));
            $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
            
            if ($this->userModel->updateResetToken($email, $token, $expires)) {
                $resetLink = APP_URL . "/auth/reset-password/" . $token;
                
                // Simulate sending email
                $logMsg = date('[Y-m-d H:i:s]') . " Reset link for {$email}: {$resetLink}\n";
                file_put_contents(APP_PATH . '/../logs/password_resets.log', $logMsg, FILE_APPEND);
                
                setFlash('success', 'Si un compte existe pour cet email, un lien de réinitialisation vous a été envoyé.');
            } else {
                setFlash('error', 'Une erreur est survenue lors de la génération du lien.');
            }
        } else {
            // Success message anyway for security reasons
            setFlash('success', 'Si un compte existe pour cet email, un lien de réinitialisation vous a été envoyé.');
        }
        
        $this->response->redirect('/auth/login');
    }
    
    public function resetPassword($token) {
        $user = $this->userModel->findByResetToken($token);
        
        if (!$user) {
            setFlash('error', 'Le lien de réinitialisation est invalide ou a expiré.');
            $this->response->redirect('/auth/login');
            return;
        }
        
        $this->response->authView('auth/reset_password', ['token' => $token]);
    }
    
    public function updatePassword() {
        $token = $this->request->post('token');
        $password = $this->request->post('password');
        $passwordConfirm = $this->request->post('password_confirm');
        
        $user = $this->userModel->findByResetToken($token);
        
        if (!$user) {
            setFlash('error', 'Session de réinitialisation expirée.');
            $this->response->redirect('/auth/login');
            return;
        }
        
        if ($password !== $passwordConfirm) {
            setFlash('error', 'Les mots de passe ne correspondent pas.');
            $this->response->authView('auth/reset_password', ['token' => $token]);
            return;
        }
        
        if (strlen($password) < 6) {
            setFlash('error', 'Le mot de passe doit faire au moins 6 caractères.');
            $this->response->authView('auth/reset_password', ['token' => $token]);
            return;
        }
        
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        
        if ($this->userModel->updatePassword($user['id_utilisateur'], $hashed)) {
            setFlash('success', 'Mot de passe mis à jour avec succès !');
            $this->response->redirect('/auth/login');
        } else {
            setFlash('error', 'Erreur lors de la mise à jour du mot de passe.');
            $this->response->authView('auth/reset_password', ['token' => $token]);
        }
    }
}
