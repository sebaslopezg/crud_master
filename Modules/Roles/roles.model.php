<?php

function insertRol(){
    $setRol = cm_set(array(
        'type' => 'post',
        'mysql_type' => 'insert',
        'data' => array(
            'id' => array('required' => false, 'value' => uniqid('',true)),
            'txtNombre' => array('required' => true),
            'txtDescripcion' => array('required' => false),
            'selStatus' => array('required'=> true),
        ),
        'sql' => "INSERT INTO roles (id, nombre, descripcion, status) VALUES(?,?,?,?)",
        'error_required_msg' => 'Algunos campos son obligatorios',
    ));
    return $setRol;
}

function getRoles(){
    $getRoles = cm_select(array(
        'all' => 'true',
        'sql' => "SELECT * FROM roles WHERE status > 0",
    ));
    return $getRoles;
}

function getRolId($id){
    $getRol = cm_select(array(
        'all' => 'true',
        'sql' => "SELECT * FROM roles WHERE status > 0 AND id = '$id'",
    ));
    return $getRol;
}

function updateRol($id){
    $setRol = cm_set(array(
        'type' => 'post',
        'mysql_type' => 'update',
        'data' => array(
            'txtNombre' => array('required' => true),
            'txtDescripcion' => array('required' => false),
            'selStatus' => array('required'=> true),
        ),
        'sql' => "UPDATE roles SET nombre = ?, descripcion = ?, status = ? WHERE id = '$id'",
        'error_required_msg' => 'Algunos campos son obligatorios',
    ));
    return $setRol;
}

function deleteRol($id){
    $deleteRol = cm_update(array(
        'sql' => "UPDATE roles SET status = ? WHERE id = '$id'",
        'arrData' => array(0),
    ));
    return $deleteRol;
}