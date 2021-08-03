<?php 

namespace Core;

abstract class Controller extends Security {
    public function callAction($action, $params = []) {
        if (method_exists($this, $action)) { 
            $array_params = [$params];
            return call_user_func_array([$this, $action], $array_params);
        } else{
            echo "No existe el método: $action dentro de la clase";
        }
    }
}

