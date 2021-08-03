<?php 

namespace Core;

class View {

    public static function render($view) {

        $file = DIR . '/src/app/views/' . $view;
        if (is_readable($file)) {
            require $file;
        } else {
            echo $file . ': Vista no encontrada';
        }
    }


    public static function renderTwig($template, $params = []) {

        static $twig = null;

        if(!file_exists(DIR . '/src/app/views/' . $template)) {
            echo "No se encuentra la vista dentro de la carpeta views del proyecto";
        } else {
            if ($twig === null) {
                $loader = new \Twig\Loader\FilesystemLoader(DIR . '/src/app/views/');
                $twig = new \Twig\Environment($loader);
                // si se ha iniciado sesion, mediante twig puedo crear una
                // variable de ambitp global, que me permitira condicionar contenido 
                // en las vistas
                if (isset($_SESSION)) {
                    $twig->addGlobal('session', $_SESSION);
                }
            }
        }
        echo $twig->render($template, $params);
    }

}

