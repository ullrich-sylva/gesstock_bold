<?php

class Router {
    private $routes = [];
    private $params = [];
    private $request;
    private $response;
    
    public function __construct(Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;
    }
    
    // Enregistrer une route GET
    public function get($path, $controller) {
        $this->routes['GET'][$path] = $controller;
    }
    
    // Enregistrer une route POST
    public function post($path, $controller) {
        $this->routes['POST'][$path] = $controller;
    }
    
    // Enregistrer une route PUT
    public function put($path, $controller) {
        $this->routes['PUT'][$path] = $controller;
    }
    
    // Enregistrer une route DELETE
    public function delete($path, $controller) {
        $this->routes['DELETE'][$path] = $controller;
    }
    
    // Enregistrer des routes ressources
    public function resource($resource) {
        $this->get("/{$resource}", "{$resource}@index");
        $this->get("/{$resource}/create", "{$resource}@create");
        $this->post("/{$resource}", "{$resource}@store");
        $this->get("/{$resource}/{id}", "{$resource}@show");
        $this->get("/{$resource}/{id}/edit", "{$resource}@edit");
        $this->post("/{$resource}/{id}/update", "{$resource}@update");
        $this->post("/{$resource}/{id}/delete", "{$resource}@delete");
    }
    
    // Dispatcher la requête
    public function dispatch() {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();
        
        // Chercher une route correspondante
        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $route => $controller) {
                if ($this->matchRoute($route, $path)) {
                    return $this->executeController($controller, $this->params);
                }
            }
        }
        
        // Route non trouvée
        $this->response->setStatusCode(404);
        $this->response->render('errors/404');
    }
    
    // Vérifier si une route correspond
    private function matchRoute($route, $path) {
        $routePattern = preg_replace('/\{[^}]+\}/', '([^/]+)', $route);
        $routePattern = str_replace('/', '\/', $routePattern);
        
        if (preg_match("/^{$routePattern}$/", $path, $matches)) {
            array_shift($matches); // Supprimer le match complet
            $this->params = $matches;
            return true;
        }
        
        return false;
    }
    
    // Exécuter un contrôleur
    private function executeController($controller, $params = []) {
        // Si c'est une closure, l'exécuter directement
        if (is_callable($controller)) {
            return call_user_func_array($controller, $params);
        }
        
        if (strpos($controller, '@') === false) {
            die("Erreur: Format de contrôleur invalide. Utilisez Controller@method");
        }
        
        [$className, $methodName] = explode('@', $controller);
        $controllerFile = APP_PATH . "/controllers/{$className}Controller.php";
        
        if (!file_exists($controllerFile)) {
            die("Erreur: Le contrôleur {$className} n'existe pas");
        }
        
        require_once $controllerFile;
        $className = "{$className}Controller";
        $controllerInstance = new $className($this->request, $this->response);
        
        if (!method_exists($controllerInstance, $methodName)) {
            die("Erreur: La méthode {$methodName} n'existe pas dans {$className}");
        }
        
        return call_user_func_array([$controllerInstance, $methodName], $params);
    }
}
