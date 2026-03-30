<?php

require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/models/UtilisateurModel.php';

class UtilisateurController extends Controller {
    private $model;
    
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        $this->model = new UtilisateurModel();
    }
    
    public function index() {
        $this->requireAuth();
        $this->requireAdmin();
        $utilisateurs = $this->model->getAll();
        $this->response->view('utilisateurs/index', ['utilisateurs' => $utilisateurs]);
    }
    
    public function create() {
        $this->requireAuth();
        $this->requireAdmin();
        $this->response->view('utilisateurs/create');
    }
    
    public function store() {
        $this->requireAuth();
        $this->requireAdmin();
        
        $email = $this->request->post('email');
        $nom = $this->request->post('nom');
        $prenom = $this->request->post('prenom');
        $role = $this->request->post('role');
        $password = $this->request->post('password');
        
        if (empty($email) || empty($nom) || empty($password)) {
            setFlash('error', 'Les champs obligatoires sont requis');
            $this->response->redirect('/utilisateur/create');
            return;
        }
        
        $data = [
            'email' => $email,
            'nom' => $nom,
            'prenom' => $prenom,
            'mot_de_passe' => password_hash($password, PASSWORD_BCRYPT),
            'role' => $role ?? ROLE_MAGASINIER,
            'actif' => 1,
            'date_creation' => date('Y-m-d H:i:s')
        ];
        
        if ($this->model->create($data)) {
            setFlash('success', 'Utilisateur créé');
            $this->response->redirect('/utilisateur');
        } else {
            setFlash('error', 'Erreur lors de la création');
            $this->response->redirect('/utilisateur/create');
        }
    }
    
    public function edit($id) {
        $this->requireAuth();
        $this->requireAdmin();
        $utilisateur = $this->model->getById($id);
        
        if (!$utilisateur) {
            $this->response->setStatusCode(404);
            $this->response->render('errors/404');
            return;
        }
        
        $this->response->view('utilisateurs/edit', ['utilisateur' => $utilisateur]);
    }
    
    public function update($id) {
        $this->requireAuth();
        $this->requireAdmin();
        
        $data = [
            'nom' => $this->request->post('nom'),
            'prenom' => $this->request->post('prenom'),
            'role' => $this->request->post('role')
        ];
        
        if ($this->model->update($id, $data)) {
            setFlash('success', 'Utilisateur mis à jour');
            $this->response->redirect('/utilisateur');
        } else {
            setFlash('error', 'Erreur lors de la mise à jour');
            $this->response->redirect("/utilisateur/{$id}/edit");
        }
    }
    
    public function delete($id) {
        $this->requireAdmin();
        
        if ($this->model->delete($id)) {
            setFlash('success', 'Utilisateur supprimé');
        } else {
            setFlash('error', 'Erreur lors de la suppression');
        }
        
        $this->response->redirect('/utilisateur');
    }
}
