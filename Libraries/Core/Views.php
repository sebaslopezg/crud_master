<?php 

class Views{
    function getView($controller, $view, $data = ""){
        $controller = get_class($controller);
        $view = "Modules/$controller/$view.view.php";
        require_once($view);
    }
}