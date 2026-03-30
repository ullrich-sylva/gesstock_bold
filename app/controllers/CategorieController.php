<?php

require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/models/CategorieModel.php';

class CategorieController extends Controller {
    private $model;
    
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        $this->requireGestionnaire();
        $this->model = new CategorieModel();
    }
    
    public function index() {
        $this->requireAuth();
        $categories = $this->model->getAll();
        $this->response->view('categories/index', ['categories' => $categories]);
    }
    
    public function create() {
        $this->requireAuth();
        $this->response->view('categories/create');
    }
    
    public function store() {
        $this->requireAuth();
        
        $libelle = $this->request->post('libelle');
        $description = $this->request->post('description');
        
        if (empty($libelle)) {
            setFlash('error', 'Le libellé est requis');
            $this->response->redirect('/categorie/create');
            return;
        }
        
        $data = [
            'libelle' => $libelle,
            'description' => $description
        ];
        
        if ($this->model->create($data)) {
            setFlash('success', 'Catégorie créée avec succès');
            $this->response->redirect('/categorie');
        } else {
            setFlash('error', 'Erreur lors de la création');
            $this->response->redirect('/categorie/create');
        }
    }
    
    public function show($id) {
        $this->requireAuth();
        $category = $this->model->getById($id);
        
        if (!$category) {
            $this->response->setStatusCode(404);
            $this->response->render('errors/404');
            return;
        }
        
        $this->response->view('categories/show', ['category' => $category]);
    }
    
    public function edit($id) {
        $this->requireAuth();
        $category = $this->model->getById($id);
        
        if (!$category) {
            $this->response->setStatusCode(404);
            $this->response->render('errors/404');
            return;
        }
        
        $this->response->view('categories/edit', ['category' => $category]);
    }
    
    public function update($id) {
        $this->requireAuth();
        
        $category = $this->model->getById($id);
        if (!$category) {
            setFlash('error', 'Catégorie non trouvée');
            $this->response->redirect('/categorie');
            return;
        }
        
        $libelle = $this->request->post('libelle');
        $description = $this->request->post('description');
        
        if (empty($libelle)) {
            setFlash('error', 'Le libellé est requis');
            $this->response->redirect("/categorie/{$id}/edit");
            return;
        }
        
        $data = [
            'libelle' => $libelle,
            'description' => $description
        ];
        
        if ($this->model->update($id, $data)) {
            setFlash('success', 'Catégorie mise à jour');
            $this->response->redirect('/categorie');
        } else {
            setFlash('error', 'Erreur lors de la mise à jour');
            $this->response->redirect("/categorie/{$id}/edit");
        }
    }
    
    public function delete($id) {
        $this->requireAdmin();
        
        if ($this->model->delete($id)) {
            setFlash('success', 'Catégorie supprimée');
        } else {
            setFlash('error', 'Erreur lors de la suppression');
        }
        
        $this->response->redirect('/categorie');
    }
}
