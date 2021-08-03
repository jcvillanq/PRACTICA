<?php

namespace Core;

class FrontController {

    private $routing;
    public $request_uri;
    public $params;

    public function __construct() {
        $this->routing = new Router;
    }

    public function run() {
        $this->request_uri = $_SERVER['REQUEST_URI']; 
        $this->params = array_merge($_GET, $_POST, $_FILES);
        $controller = $this->routing->getController($this->request_uri);
        $action = $this->routing->getAction($this->request_uri);
        $controller->callAction($action, $this->params);
    }     

}
