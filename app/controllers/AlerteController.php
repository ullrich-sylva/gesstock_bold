<?php

require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/models/AlerteModel.php';

class AlerteController extends Controller {
    private $model;
    
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        $this->requireMagasinier();
        $this->model = new AlerteModel();
    }
    
    public function index() {
        $this->requireAuth();
        $alertes = $this->model->getActive();
        $this->response->view('alertes/index', ['alertes' => $alertes]);
    }
}
