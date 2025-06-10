<?php

//Pendiente por plicar a hooks
spl_autoload_register(function($class){
    if (file_exists("Hooks/".$class.".php")) {
        require_once("Hooks/".$class.".php");
    }
});