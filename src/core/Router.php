<?php

namespace Core;

class Router {

    private $routes;

    public function __construct() {
        $routes_json = file_get_contents(CONFIG_DIR . 'routes.json');
        $this->routes = json_decode($routes_json, true);
    }

    public function requestUriFilter($uri) {
        $uri = ltrim($uri, '/');
        return substr($uri, strpos($uri, '/') + 1);
    }

    public function getController($uri) {
        $uriRequest = $this->requestUriFilter($uri);
        if (array_key_exists($uriRequest, $this->routes)) {
            $classController = '\\App\Controllers\\' . $this->routes[$uriRequest]['controller'];
            return new $classController;
        } else {
            echo "La ruta requerida no existe en routes.json. Error 404";
        }
    }

    public function getAction($uri) {
        $uriRequest = $this->requestUriFilter($uri);
        return $this->routes[$uriRequest]['action'];
    }

}
