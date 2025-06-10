<?php

//crear funcion de schema para creacion en BD

function selectModules(){
    $response = cm_select(array(
        'all' => 'true',
        'sql' => 'SELECT * FROM sys_modules WHERE status > 0'
    )); 
    return $response;
}