<?php

//crear funcion de schema para creacion en BD
function schema(){
    cm_schema_mysql('sys_modulos',[
        [
            'name' => 'id',
            'type' => 'varchar',
            'length' => 30,
            'index' => 'primary'
        ],
        [
            'name' => 'nombre',
            'type' => 'varchar',
            'length' => 60
        ],
        [
            'name' => 'descripcion',
            'type' => 'varchar',
            'length' => 50
        ],
        [
            'name' => 'status',
            'type' => 'int',
            'length' => 1
        ],
    ]);
}

function selectModules(){
    $response = cm_select([
        'all' => 'true',
        'sql' => 'SELECT * FROM sys_modules WHERE status > 0'
    ]); 
    return $response;
}