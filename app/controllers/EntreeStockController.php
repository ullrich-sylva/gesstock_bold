<?php

require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/models/EntreeStockModel.php';
require_once APP_PATH . '/models/FournisseurModel.php';

class EntreeStockController extends Controller {
    private $model;
    private $fournisseurModel;
    
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        $this->model = new EntreeStockModel();
        $this->fournisseurModel = new FournisseurModel();
    }
    
    public function index() {
        $this->requireAuth();
        $entrees = $this->model->getWithDetails();
        $this->response->view('entrees_stock/index', ['entrees' => $entrees]);
    }
    
    public function create() {
        $this->requireAuth();
        $fournisseurs = $this->fournisseurModel->getActive();
        $this->response->view('entrees_stock/create', ['fournisseurs' => $fournisseurs]);
    }
    
    public function store() {
        $this->requireAuth();
        
        $reference = $this->request->post('reference');
        $fournisseur_id = $this->request->post('fournisseur_id');
        $description = $this->request->post('description');
        
        if (empty($reference) || empty($fournisseur_id)) {
            setFlash('error', 'Les champs obligatoires sont requis');
            $this->response->redirect('/entree-stock/create');
            return;
        }
        
        $data = [
            'reference' => $reference,
            'fournisseur_id' => $fournisseur_id,
            'description' => $description,
            'date_entree' => date('Y-m-d'),
            'date_creation' => date('Y-m-d H:i:s')
        ];
        
        if ($this->model->create($data)) {
            setFlash('success', 'Entrée de stock créée');
            $this->response->redirect('/entree-stock');
        } else {
            setFlash('error', 'Erreur lors de la création');
            $this->response->redirect('/entree-stock/create');
        }
    }
    
    public function show($id) {
        $this->requireAuth();
        $entree = $this->model->getById($id);
        
        if (!$entree) {
            $this->response->setStatusCode(404);
            $this->response->render('errors/404');
            return;
        }
        
        $this->response->view('entrees_stock/show', ['entree' => $entree]);
    }
}
