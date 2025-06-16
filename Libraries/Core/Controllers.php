<?php

class Controllers{
    public function __construct(){
        $this->views = new Views();
        $this->loadModel();
        isset($_SESSION) ? '' : session_start();
    }

    public function loadModel(){
        $class = get_class($this);
        $routClass = "Modules/$class/$class.model.php";
        if (file_exists($routClass)) {
            require_once($routClass);
            //$this->model = new $model();
        }
    }

    public function schema(){
        function_exists('schema') ? schema() : '';
    }
}