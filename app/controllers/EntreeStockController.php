<?php

require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/models/EntreeStockModel.php';
require_once APP_PATH . '/models/FournisseurModel.php';

class EntreeStockController extends Controller {
    private $model;
    private $fournisseurModel;
    
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        $this->requireMagasinier();
        $this->model = new EntreeStockModel();
        $this->fournisseurModel = new FournisseurModel();
    }
    
    public function index() {
        $this->requireAuth();
        $entrees = $this->model->getWithDetails();
        $this->response->view('entrees_stock/index', ['entrees' => $entrees]);
    }
    
    public function create() {
        $this->requireMagasinier();
        $fournisseurs = $this->fournisseurModel->getActive();
        $this->response->view('entrees_stock/create', ['fournisseurs' => $fournisseurs]);
    }
    
    public function store() {
        $this->requireMagasinier();
        
        $reference = $this->request->post('reference');
        $fournisseur_id = $this->request->post('fournisseur_id');
        $observation = $this->request->post('description');
        
        if (empty($reference) || empty($fournisseur_id)) {
            setFlash('error', 'Les champs obligatoires sont requis');
            $this->response->redirect('/entree-stock/create');
            return;
        }

        require_once APP_PATH . '/models/BonLivraisonModel.php';
        $bonModel = new BonLivraisonModel();
        
        // 1. Chercher ou créer le bon de livraison
        $bon = $bonModel->getByNumero($reference);
        if ($bon) {
            $id_bon = $bon['id_bon'];
        } else {
            $id_bon = $bonModel->create([
                'numero_bon' => $reference,
                'id_fournisseur' => $fournisseur_id,
                'id_recepteur' => Auth::user()['id_utilisateur'],
                'date_livraison' => date('Y-m-d H:i:s'),
                'observation' => $observation
            ]);
        }
        
        if (!$id_bon) {
            setFlash('error', 'Erreur lors de la préparation du bon de livraison');
            $this->response->redirect('/entree-stock/create');
            return;
        }
        
        // 2. Créer l'entrée de stock
        $data = [
            'id_bon' => $id_bon,
            'id_utilisateur' => Auth::user()['id_utilisateur'],
            'date_entree' => date('Y-m-d H:i:s'),
            'statut' => 'en_attente',
            'observation' => $observation
        ];
        
        if ($this->model->create($data)) {
            setFlash('success', 'Entrée de stock créée et mise en attente de validation');
            $this->response->redirect('/entree-stock');
        } else {
            setFlash('error', 'Erreur lors de la création de l\'entrée');
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
