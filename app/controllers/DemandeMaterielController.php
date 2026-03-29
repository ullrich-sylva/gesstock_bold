<?php

require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/models/DemandeMaterielModel.php';

class DemandeMaterielController extends Controller {
    private $model;
    
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        $this->model = new DemandeMaterielModel();
    }
    
    public function index() {
        $this->requireAuth();
        $demandes = $this->model->getWithDetails();
        $this->response->view('demandes_materiel/index', ['demandes' => $demandes]);
    }
    
    public function create() {
        $this->requireAuth();
        $this->response->view('demandes_materiel/create');
    }
    
    public function store() {
        $this->requireAuth();
        
        $reference = $this->request->post('reference');
        $description = $this->request->post('description');
        
        if (empty($reference)) {
            setFlash('error', 'La référence est requise');
            $this->response->redirect('/demande-materiel/create');
            return;
        }
        
        $data = [
            'reference' => $reference,
            'description' => $description,
            'utilisateur_id' => Auth::user()['id'],
            'statut' => 'en_attente',
            'date_demande' => date('Y-m-d'),
            'date_creation' => date('Y-m-d H:i:s')
        ];
        
        if ($this->model->create($data)) {
            setFlash('success', 'Demande créée');
            $this->response->redirect('/demande-materiel');
        } else {
            setFlash('error', 'Erreur lors de la création');
            $this->response->redirect('/demande-materiel/create');
        }
    }
    
    public function show($id) {
        $this->requireAuth();
        $demande = $this->model->getById($id);
        
        if (!$demande) {
            $this->response->setStatusCode(404);
            $this->response->render('errors/404');
            return;
        }
        
        $this->response->view('demandes_materiel/show', ['demande' => $demande]);
    }
    
    public function edit($id) {
        $this->requireAuth();
        $demande = $this->model->getById($id);
        
        if (!$demande) {
            $this->response->setStatusCode(404);
            $this->response->render('errors/404');
            return;
        }
        
        $this->response->view('demandes_materiel/edit', ['demande' => $demande]);
    }
    
    public function update($id) {
        $this->requireAuth();
        
        $data = [
            'description' => $this->request->post('description'),
            'statut' => $this->request->post('statut')
        ];
        
        if ($this->model->update($id, $data)) {
            setFlash('success', 'Demande mise à jour');
            $this->response->redirect('/demande-materiel');
        } else {
            setFlash('error', 'Erreur lors de la mise à jour');
            $this->response->redirect("/demande-materiel/{$id}/edit");
        }
    }
}
