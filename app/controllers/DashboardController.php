<?php

require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/models/EquipementModel.php';
require_once APP_PATH . '/models/AlerteModel.php';
require_once APP_PATH . '/models/CategorieModel.php';

class DashboardController extends Controller {
    private $equipementModel;
    private $alerteModel;
    private $categorieModel;
    
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        $this->equipementModel = new EquipementModel();
        $this->alerteModel = new AlerteModel();
        $this->categorieModel = new CategorieModel();
    }
    
    public function index() {
        $this->requireAuth();
        
        $data = [
            'low_stock_equipements' => $this->equipementModel->getLowStock(),
            'active_alerts' => $this->alerteModel->getActive(),
            'total_equipements' => $this->equipementModel->count(),
            'categories' => $this->categorieModel->getAll(),
        ];
        
        $this->response->view('dashboard/index', $data);
    }
    
    public function redirect() {
        $this->response->redirect('/dashboard');
    }
}
