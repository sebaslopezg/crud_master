<?php

function insertRol(){
    $setRol = cm_set([
        'type' => 'post',
        'mysql_type' => 'insert',
        'data' => [
            'id' => ['required' => false, 'value' => uniqid('',true)],
            'txtNombre' => ['required' => true],
            'txtDescripcion' => ['required' => false],
            'selStatus' => ['required'=> true],
        ],
        'sql' => "INSERT INTO roles (id, nombre, descripcion, status) VALUES(?,?,?,?)",
        'error_required_msg' => 'Algunos campos son obligatorios',
    ]);
    return $setRol;
}

function getRoles(){
    $getRoles = cm_select([
        'all' => 'true',
        'sql' => "SELECT * FROM roles WHERE status > 0",
    ]);
    return $getRoles;
}

function getRolId($id){
    $getRol = cm_select([
        'all' => 'true',
        'sql' => "SELECT * FROM roles WHERE status > 0 AND id = '$id'",
    ]);
    return $getRol;
}

function updateRol($id){
    $setRol = cm_set([
        'type' => 'post',
        'mysql_type' => 'update',
        'data' => [
            'txtNombre' => ['required' => true],
            'txtDescripcion' => ['required' => false],
            'selStatus' => ['required'=> true],
        ],
        'sql' => "UPDATE roles SET nombre = ?, descripcion = ?, status = ? WHERE id = '$id'",
        'error_required_msg' => 'Algunos campos son obligatorios',
    ]);
    return $setRol;
}

function deleteRol($id){

    $response;

    $selectUsuario = cm_select([
        'all' => 'true',
        'sql' => "SELECT * FROM usuarios WHERE rol_id = '$id' AND status > 0",
    ]);

    if($selectUsuario){
        $response = ['status' => false, 'msg' => 'No se puede eliminar el rol porque tiene usuarios asignados'];
    }else{
        $deleteRol = cm_update([
            'sql' => "UPDATE roles SET status = ? WHERE id = '$id'",
            'arrData' => array(0),
        ]);
        $response = $deleteRol;
    }

    return $response;
}