<?php

function create(){
    $response = cm_set([
        'type' => 'post',
        'mysql_type' => 'insert',
        'data' => [
            'id' => ['required' => false, 'value' => uniqid('',false)],
            'modify_date' => ['required' => false, 'value' => date("Y-m-d H:i:s")],
            'modify_by' => ['required' => false, 'value' => getUser('id')],
            'selStatus' => ['required' => true, 'required_values' => [1,2]],
            'txtNombre' => ['required' => true],
            'txtDescripcion' => ['required' => true],
        ],
        'sql' => "INSERT INTO almacenes(id, modify_date, modify_by, status, nombre, descripcion) VALUES(?,?,?,?,?,?)",
        'error_exist_msg' => 'Algunos campos son obligatorios',
    ]);

    return $response;
}

function view(){
    $response = cm_select([
        'all' => 'true',
        'sql' => "SELECT id, nombre, descripcion, status FROM almacenes WHERE status > 0",
    ]);

    return $response;
}