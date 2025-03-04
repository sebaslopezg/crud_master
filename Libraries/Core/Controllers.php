<?php

class Controllers{
    public function __construct(){
        $this->views = new Views();
        $this->loadModel();
    }

    public function loadModel(){
        $class = get_class($this);
        $routClass = "Modules/$class/$class.model.php";
        if (file_exists($routClass)) {
            require_once($routClass);
            //$this->model = new $model();
        }
    }

/*     public function initModule(){
        $moduleInitPath = "Modules/modules.ini.php";

        if(file_exists($moduleInitPath)){
            require_once($moduleInitPath);
        }
    } */
}