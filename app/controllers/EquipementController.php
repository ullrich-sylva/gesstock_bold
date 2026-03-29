<?php

require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/models/EquipementModel.php';
require_once APP_PATH . '/models/CategorieModel.php';

class EquipementController extends Controller {
    private $model;
    private $categorieModel;
    
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        $this->model = new EquipementModel();
        $this->categorieModel = new CategorieModel();
    }
    
    public function index() {
        $this->requireAuth();
        $equipements = $this->model->getWithCategory();
        $this->response->view('equipements/index', ['equipements' => $equipements]);
    }
    
    public function create() {
        $this->requireAuth();
        $categories = $this->categorieModel->getAll();
        $this->response->view('equipements/create', ['categories' => $categories]);
    }
    
    public function store() {
        $this->requireAuth();
        
        $reference = $this->request->post('reference');
        $nom = $this->request->post('nom');
        $description = $this->request->post('description');
        $categorie_id = $this->request->post('categorie_id');
        $quantite = $this->request->post('quantite_stock');
        $seuil_alerte = $this->request->post('seuil_alerte');
        $prix_unitaire = $this->request->post('prix_unitaire');
        
        if (empty($reference) || empty($nom) || empty($categorie_id)) {
            setFlash('error', 'Les champs obligatoires sont requis');
            $this->response->redirect('/equipement/create');
            return;
        }
        
        $data = [
            'reference' => $reference,
            'nom' => $nom,
            'description' => $description,
            'categorie_id' => $categorie_id,
            'quantite_stock' => $quantite ?? 0,
            'seuil_alerte' => $seuil_alerte ?? 10,
            'prix_unitaire' => $prix_unitaire ?? 0,
            'date_creation' => date('Y-m-d H:i:s')
        ];
        
        if ($this->model->create($data)) {
            setFlash('success', 'Équipement créé');
            $this->response->redirect('/equipement');
        } else {
            setFlash('error', 'Erreur lors de la création');
            $this->response->redirect('/equipement/create');
        }
    }
    
    public function show($id) {
        $this->requireAuth();
        $equipement = $this->model->getById($id);
        
        if (!$equipement) {
            $this->response->setStatusCode(404);
            $this->response->render('errors/404');
            return;
        }
        
        $this->response->view('equipements/show', ['equipement' => $equipement]);
    }
    
    public function edit($id) {
        $this->requireAuth();
        $equipement = $this->model->getById($id);
        
        if (!$equipement) {
            $this->response->setStatusCode(404);
            $this->response->render('errors/404');
            return;
        }
        
        $categories = $this->categorieModel->getAll();
        $this->response->view('equipements/edit', ['equipement' => $equipement, 'categories' => $categories]);
    }
    
    public function update($id) {
        $this->requireAuth();
        
        $equipement = $this->model->getById($id);
        if (!$equipement) {
            setFlash('error', 'Équipement non trouvé');
            $this->response->redirect('/equipement');
            return;
        }
        
        $data = [
            'nom' => $this->request->post('nom'),
            'description' => $this->request->post('description'),
            'categorie_id' => $this->request->post('categorie_id'),
            'quantite_stock' => $this->request->post('quantite_stock'),
            'seuil_alerte' => $this->request->post('seuil_alerte'),
            'prix_unitaire' => $this->request->post('prix_unitaire')
        ];
        
        if ($this->model->update($id, $data)) {
            setFlash('success', 'Équipement mis à jour');
            $this->response->redirect('/equipement');
        } else {
            setFlash('error', 'Erreur lors de la mise à jour');
            $this->response->redirect("/equipement/{$id}/edit");
        }
    }
    
    public function delete($id) {
        $this->requireAdmin();
        
        if ($this->model->delete($id)) {
            setFlash('success', 'Équipement supprimé');
        } else {
            setFlash('error', 'Erreur lors de la suppression');
        }
        
        $this->response->redirect('/equipement');
    }
}
