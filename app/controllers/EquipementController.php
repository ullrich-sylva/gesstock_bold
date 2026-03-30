<?php

require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/models/EquipementModel.php';
require_once APP_PATH . '/models/CategorieModel.php';

class EquipementController extends Controller {
    private $model;
    private $categorieModel;
    
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        $this->requireMagasinier(); // Base access for all authenticated roles
        $this->model = new EquipementModel();
        $this->categorieModel = new CategorieModel();
    }
    
    public function index() {
        $this->requireAuth();
        $equipements = $this->model->getWithCategory();
        $this->response->view('equipements/index', ['equipements' => $equipements]);
    }
    
    public function create() {
        $this->requireGestionnaire();
        $categories = $this->categorieModel->getAll();
        $this->response->view('equipements/create', ['categories' => $categories]);
    }
    
    public function store() {
        $this->requireGestionnaire();
        
        $reference = $this->request->post('reference');
        $designation = $this->request->post('designation');
        $id_categorie = $this->request->post('id_categorie');
        $stock_actuel = $this->request->post('stock_actuel');
        $seuil_min = $this->request->post('seuil_min');
        $seuil_max = $this->request->post('seuil_max');
        $unite = $this->request->post('unite');
        
        if (empty($reference) || empty($designation) || empty($id_categorie)) {
            setFlash('error', 'Les champs obligatoires sont requis');
            $this->response->redirect('/equipement/create');
            return;
        }
        
        $data = [
            'reference' => $reference,
            'designation' => $designation,
            'id_categorie' => $id_categorie,
            'stock_actuel' => $stock_actuel ?? 0,
            'seuil_min' => $seuil_min ?? 5,
            'seuil_max' => $seuil_max ?? 100,
            'unite' => $unite ?? 'Pièce'
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
        $this->requireGestionnaire();
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
        $this->requireGestionnaire();
        
        $equipement = $this->model->getById($id);
        if (!$equipement) {
            setFlash('error', 'Équipement non trouvé');
            $this->response->redirect('/equipement');
            return;
        }
        
        $data = [
            'reference' => $this->request->post('reference'),
            'designation' => $this->request->post('designation'),
            'id_categorie' => $this->request->post('id_categorie'),
            'stock_actuel' => $this->request->post('stock_actuel'),
            'seuil_min' => $this->request->post('seuil_min'),
            'seuil_max' => $this->request->post('seuil_max'),
            'unite' => $this->request->post('unite') ?? 'Pièce'
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
