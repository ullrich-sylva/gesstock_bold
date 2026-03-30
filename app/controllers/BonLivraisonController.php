<?php

require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/models/BonLivraisonModel.php';

class BonLivraisonController extends Controller {
    private $model;
    
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        $this->model = new BonLivraisonModel();
    }
    
    public function index() {
        $this->requireAuth();
        $bons = $this->model->getWithDetails();
        $this->response->view('bons_livraison/index', ['bons' => $bons]);
    }
    
    public function create() {
        $this->requireAuth();
        $this->response->view('bons_livraison/create');
    }
    
    public function store() {
        $this->requireAuth();
        
        $reference = $this->request->post('reference');
        $demande_id = $this->request->post('demandemateriel_id');
        $description = $this->request->post('description');
        
        if (empty($reference)) {
            setFlash('error', 'La référence est requise');
            $this->response->redirect('/bon-livraison/create');
            return;
        }

        // Vérifier si le numéro existe déjà
        $existing = $this->model->getByNumero($reference);
        if ($existing) {
            setFlash('error', "Le numéro de bon '{$reference}' existe déjà");
            $this->response->redirect('/bon-livraison/create');
            return;
        }
        
        $fournisseur_id = $this->request->post('id_fournisseur') ?: 1; // Fallback au premier fournisseur
        
        $data = [
            'numero_bon' => $reference,
            'id_fournisseur' => $fournisseur_id,
            'id_recepteur' => Auth::user()['id_utilisateur'],
            'date_livraison' => date('Y-m-d H:i:s'),
            'observation' => $description
        ];
        
        if ($this->model->create($data)) {
            setFlash('success', 'Bon de livraison créé');
            $this->response->redirect('/bon-livraison');
        } else {
            setFlash('error', 'Erreur lors de la création');
            $this->response->redirect('/bon-livraison/create');
        }
    }
    
    public function show($id) {
        $this->requireAuth();
        $bon = $this->model->getById($id);
        
        if (!$bon) {
            $this->response->setStatusCode(404);
            $this->response->render('errors/404');
            return;
        }
        
        $this->response->view('bons_livraison/show', ['bon' => $bon]);
    }
}
