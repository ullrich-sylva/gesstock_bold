<?php

require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/models/SortieStockModel.php';
require_once APP_PATH . '/models/EquipementModel.php';

class SortieStockController extends Controller {
    private $model;
    
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        $this->requireMagasinier();
        $this->model = new SortieStockModel();
    }
    
    public function index() {
        $this->requireAuth();
        $sorties = $this->model->getWithDetails();
        $this->response->view('sorties_stock/index', ['sorties' => $sorties]);
    }
    
    public function create() {
        $this->requireMagasinier();
        $equipementModel = new EquipementModel();
        $equipements = $equipementModel->getAll();
        $this->response->view('sorties_stock/create', ['equipements' => $equipements]);
    }
    
    public function store() {
        $this->requireMagasinier();
        
        $numero_bon = $this->request->post('reference');
        $id_equipement = $this->request->post('id_equipement');
        $quantite = $this->request->post('quantite');
        $observation = $this->request->post('description');
        
        if (empty($numero_bon) || empty($id_equipement) || empty($quantite)) {
            setFlash('error', 'Les champs obligatoires sont requis');
            $this->response->redirect('/sortie-stock/create');
            return;
        }
        
        $data = [
            'numero_bon' => $numero_bon,
            'id_equipement' => $id_equipement,
            'quantite' => $quantite,
            'id_utilisateur' => Auth::user()['id_utilisateur'],
            'observation' => $observation,
            'date_sortie' => date('Y-m-d H:i:s'),
            'statut' => 'en_attente'
        ];
        
        if ($this->model->create($data)) {
            // Mise à jour automatique du stock et vérification des alertes
            $equipementModel = new EquipementModel();
            $equipementModel->updateStock($id_equipement, -$quantite);
            
            setFlash('success', 'Sortie de stock enregistrée et stock mis à jour');
            $this->response->redirect('/sortie-stock');
        } else {
            setFlash('error', 'Erreur lors de la création');
            $this->response->redirect('/sortie-stock/create');
        }
    }
    
    public function show($id) {
        $this->requireAuth();
        $sortie = $this->model->getById($id);
        
        if (!$sortie) {
            $this->response->setStatusCode(404);
            $this->response->render('errors/404');
            return;
        }
        
        $this->response->view('sorties_stock/show', ['sortie' => $sortie]);
    }
}
