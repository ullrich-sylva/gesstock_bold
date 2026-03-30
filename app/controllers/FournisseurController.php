<?php

require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/models/FournisseurModel.php';

class FournisseurController extends Controller {
    private $model;
    
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        $this->requireGestionnaire();
        $this->model = new FournisseurModel();
    }
    
    public function index() {
        $this->requireAuth();
        $fournisseurs = $this->model->getAll();
        $this->response->view('fournisseurs/index', ['fournisseurs' => $fournisseurs]);
    }
    
    public function create() {
        $this->requireAuth();
        $this->response->view('fournisseurs/create');
    }
    
    public function store() {
        $this->requireAuth();
        
        $nom = $this->request->post('nom');
        $email = $this->request->post('email');
        $telephone = $this->request->post('telephone');
        $adresse = $this->request->post('adresse');
        
        if (empty($nom)) {
            setFlash('error', 'Le nom est requis');
            $this->response->redirect('/fournisseur/create');
            return;
        }
        
        $data = [
            'nom' => $nom,
            'email' => $email,
            'telephone' => $telephone,
            'adresse' => $adresse
        ];
        
        if ($this->model->create($data)) {
            setFlash('success', 'Fournisseur créé');
            $this->response->redirect('/fournisseur');
        } else {
            setFlash('error', 'Erreur lors de la création');
            $this->response->redirect('/fournisseur/create');
        }
    }
    
    public function edit($id) {
        $this->requireAuth();
        $fournisseur = $this->model->getById($id);
        
        if (!$fournisseur) {
            $this->response->setStatusCode(404);
            $this->response->render('errors/404');
            return;
        }
        
        $this->response->view('fournisseurs/edit', ['fournisseur' => $fournisseur]);
    }
    
    public function update($id) {
        $this->requireAuth();
        
        $data = [
            'nom' => $this->request->post('nom'),
            'email' => $this->request->post('email'),
            'telephone' => $this->request->post('telephone'),
            'adresse' => $this->request->post('adresse')
        ];
        
        if ($this->model->update($id, $data)) {
            setFlash('success', 'Fournisseur mis à jour');
            $this->response->redirect('/fournisseur');
        } else {
            setFlash('error', 'Erreur lors de la mise à jour');
            $this->response->redirect("/fournisseur/{$id}/edit");
        }
    }
    
    public function delete($id) {
        $this->requireAdmin();
        
        if ($this->model->delete($id)) {
            setFlash('success', 'Fournisseur supprimé');
        } else {
            setFlash('error', 'Erreur lors de la suppression');
        }
        
        $this->response->redirect('/fournisseur');
    }
}
