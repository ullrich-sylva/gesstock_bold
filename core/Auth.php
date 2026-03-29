<?php

class Auth {
    private $userModel;
    
    public function __construct() {
        require_once APP_PATH . '/models/UtilisateurModel.php';
        $this->userModel = new UtilisateurModel();
    }
    
    // Enregistrer un nouvel utilisateur
    public function register($email, $nom, $prenom, $password) {
        // Vérifier si l'utilisateur existe déjà
        $userByEmail = $this->userModel->findByEmail($email);
        if ($userByEmail) {
            return ['success' => false, 'message' => 'Cet email est déjà utilisé'];
        }
        
        // Générer un login unique
        $login = strtolower(substr($prenom, 0, 1) . $nom);
        $login = str_replace(' ', '', $login);
        
        // Vérifier l'unicité du login
        $counter = 1;
        $original_login = $login;
        while ($this->userModel->findByLogin($login)) {
            $login = $original_login . $counter;
            $counter++;
        }
        
        // Créer l'utilisateur
        $data = [
            'email' => $email,
            'nom' => $nom,
            'prenom' => $prenom,
            'login' => $login,
            'mot_de_passe' => password_hash($password, PASSWORD_BCRYPT),
            'role' => 'technicien',
            'actif' => 1,
            'date_creation' => date('Y-m-d H:i:s')
        ];
        
        if ($this->userModel->create($data)) {
            return ['success' => true, 'message' => 'Inscription réussie'];
        }
        
        return ['success' => false, 'message' => 'Erreur lors de l\'inscription'];
    }
    
    // Connexion
    public function login($email, $password) {
        // Essayer d'abord avec l'email
        $user = $this->userModel->findByEmail($email);
        
        // Sinon essayer avec le login
        if (!$user) {
            $user = $this->userModel->findByLogin($email);
        }
        
        if (!$user) {
            return ['success' => false, 'message' => 'Email/Login ou mot de passe incorrect'];
        }
        
        if (!$user['actif']) {
            return ['success' => false, 'message' => 'Compte désactivé'];
        }
        
        if (!password_verify($password, $user['mot_de_passe'])) {
            return ['success' => false, 'message' => 'Email/Login ou mot de passe incorrect'];
        }
        
        // Définir la session
        setUser($user);
        
        return ['success' => true, 'message' => 'Connexion réussie'];
    }
    
    // Vérifier si l'utilisateur est authentifié
    public static function isAuthenticated() {
        return isLoggedIn();
    }
    
    // Vérifier les permissions
    public static function hasRole($role) {
        $user = getCurrentUser();
        return $user && $user['role'] === $role;
    }
    
    // Vérifier si l'utilisateur est admin
    public static function isAdmin() {
        return self::hasRole('administrateur');
    }
    
    // Obtenir l'utilisateur actuel
    public static function user() {
        return getCurrentUser();
    }
}
