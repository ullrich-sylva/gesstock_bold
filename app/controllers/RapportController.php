<?php

require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/models/RapportModel.php';

class RapportController extends Controller {
    private $model;
    
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        $this->model = new RapportModel();
    }
    
    public function index() {
        $this->requireAuth();
        $data = [
            'stock_summary' => $this->model->getStockSummary()
        ];
        $this->response->view('rapports/index', $data);
    }
    
    public function mouvements() {
        $this->requireAuth();
        $start_date = $this->request->get('start_date', date('Y-m-01'));
        $end_date = $this->request->get('end_date', date('Y-m-d'));
        
        $mouvements = $this->model->getMovementsByDateRange($start_date, $end_date);
        
        $this->response->view('rapports/mouvements', [
            'mouvements' => $mouvements,
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);
    }
    
    public function alertes_historique() {
        $this->requireAuth();
        $alertes = $this->model->getAlertHistory();
        $this->response->view('rapports/alertes_historique', ['alertes' => $alertes]);
    }
}
