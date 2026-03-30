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
        
        $motif = $this->request->post('motif') ?? $this->request->post('reference');
        $observation = $this->request->post('observation') ?? $this->request->post('description');
        
        if (empty($motif)) {
            setFlash('error', 'Le motif est requis');
            $this->response->redirect('/demande-materiel/create');
            return;
        }
        
        $data = [
            'id_technicien' => Auth::user()['id_utilisateur'],
            'date_demande' => date('Y-m-d H:i:s'),
            'statut' => 'en_attente',
            'motif' => $motif,
            'observation' => $observation
        ];
        
        if ($this->model->create($data)) {
            setFlash('success', 'Demande envoyée avec succès');
            $this->response->redirect('/demande-materiel');
        } else {
            setFlash('error', 'Erreur lors de la création de la demande');
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
            'observation' => $this->request->post('description'),
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
