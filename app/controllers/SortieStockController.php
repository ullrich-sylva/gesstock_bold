<?php

require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/models/SortieStockModel.php';

class SortieStockController extends Controller {
    private $model;
    
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        $this->model = new SortieStockModel();
    }
    
    public function index() {
        $this->requireAuth();
        $sorties = $this->model->getWithDetails();
        $this->response->view('sorties_stock/index', ['sorties' => $sorties]);
    }
    
    public function create() {
        $this->requireAuth();
        $this->response->view('sorties_stock/create');
    }
    
    public function store() {
        $this->requireAuth();
        
        $reference = $this->request->post('reference');
        $description = $this->request->post('description');
        
        if (empty($reference)) {
            setFlash('error', 'La référence est requise');
            $this->response->redirect('/sortie-stock/create');
            return;
        }
        
        $data = [
            'reference' => $reference,
            'description' => $description,
            'utilisateur_id' => Auth::user()['id'],
            'date_sortie' => date('Y-m-d'),
            'date_creation' => date('Y-m-d H:i:s')
        ];
        
        if ($this->model->create($data)) {
            setFlash('success', 'Sortie de stock créée');
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
