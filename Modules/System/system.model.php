<?php

//crear funcion de schema para creacion en BD
function schema(){
    cm_schema_mysql('sys_log',[
        [
            'name' => 'log_key',
            'type' => 'varchar',
            'length' => 60,
            'index' => 'primary key'
        ],
        [
            'name' => 'log_value',
            'type' => 'longtext',
        ],
    ]);

    cm_schema_mysql('sys_modules',[
        [
            'name' => 'id',
            'type' => 'varchar',
            'length' => 30,
            'index' => 'primary key'
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

    $query = cm_select([
        'all' => 'true',
        'sql' => "SELECT COUNT(*) AS COUNT FROM sys_modules"
    ]); 

    $isEmpty = $query[0]['COUNT'];
    
    if(!$isEmpty){
        cm_set([
            'type' => 'post',
            'mysql_type' => 'insert',
            'data' => [
                'id' => ['required' => false, 'value' => 'usuarios'],
                'nombre' => ['required' => false, 'value' => 'Usuarios'],
                'descripcion' => ['required' => false, 'value' => 'Users'],
                'status' => ['required' => false, 'value' => 1],
            ],
            'sql' => "INSERT INTO sys_modules(id, nombre, descripcion, status) VALUES (?, ?, ?, ?)",
            'error_required_msg' => '',
        ]);
    }

}

function selectModules(){
    $response = cm_select([
        'all' => 'true',
        'sql' => 'SELECT * FROM sys_modules WHERE status > 0'
    ]); 
    return $response;
}