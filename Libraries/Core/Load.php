<?php

$controller = ucwords($controller);
//$controllerFile = "Controllers/" . $controller . ".php";
$controllerFile = "Modules/$controller/$controller.controller.php";

if (file_exists($controllerFile)) {
    require_once($controllerFile);
    $controller = new $controller();
    $moduleInitPath = "Modules/modules.ini.php";

    if(file_exists($moduleInitPath)){
        require_once($moduleInitPath);
    }
    
    if (method_exists($controller, $method)) {
        $controller->{$method}($params);
    }else{
        require_once("Modules/Errors/error.controller.php");
    }
}else{
    require_once("Modules/Errors/error.controller.php");
}
