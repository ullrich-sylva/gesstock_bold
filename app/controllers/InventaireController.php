<?php

require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/models/InventaireModel.php';

class InventaireController extends Controller {
    private $model;
    
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        $this->model = new InventaireModel();
    }
    
    public function index() {
        $this->requireAuth();
        $inventaires = $this->model->getWithDetails();
        $this->response->view('inventaires/index', ['inventaires' => $inventaires]);
    }
    
    public function create() {
        $this->requireAuth();
        $this->response->view('inventaires/create');
    }
    
    public function store() {
        $this->requireAuth();
        
        $reference = $this->request->post('reference');
        $description = $this->request->post('description');
        
        if (empty($reference)) {
            setFlash('error', 'La référence est requise');
            $this->response->redirect('/inventaire/create');
            return;
        }
        
        $data = [
            'reference' => $reference,
            'description' => $description,
            'utilisateur_id' => Auth::user()['id'],
            'date_inventaire' => date('Y-m-d'),
            'date_creation' => date('Y-m-d H:i:s')
        ];
        
        if ($this->model->create($data)) {
            setFlash('success', 'Inventaire créé');
            $this->response->redirect('/inventaire');
        } else {
            setFlash('error', 'Erreur lors de la création');
            $this->response->redirect('/inventaire/create');
        }
    }
    
    public function show($id) {
        $this->requireAuth();
        $inventaire = $this->model->getById($id);
        
        if (!$inventaire) {
            $this->response->setStatusCode(404);
            $this->response->render('errors/404');
            return;
        }
        
        $this->response->view('inventaires/show', ['inventaire' => $inventaire]);
    }
}
