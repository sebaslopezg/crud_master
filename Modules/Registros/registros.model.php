<?php

function selectRegistros(){
    $selectFacturas = cm_select(array(
        'all' => 'true',
        'sql' => 'SELECT * FROM registros WHERE status > 0'
    )); 
    return $selectFacturas;
}

function insertRegistro(){
    $setRegistro = cm_set(array(
        'type' => 'post',
        'mysql_type' => 'insert',
        'data' => array(
            'id' => array('required' => false, 'value' => uniqid('',true)),
            'txtNombre' => array('required' => true),
            'txtApellido' => array('required' => true),
            'status' => array('required' => false, 'value' => 1),
        ),
        'sql' => "INSERT INTO registros (id, nombre, apellido, status) VALUES (?, ?, ?, ?)",
        'error_required_msg' => 'Debe insertar todos los datos',
    ));
    return $setRegistro;
}

function updateRegistro($id){
    $setRegistro = cm_set(array(
        'type' => 'post',
        'mysql_type' => 'update',
        'data' => array(
            'txtNombre' => array('required' => true),
            'txtApellido' => array('required' => true),
        ),
        'sql' => "UPDATE registros SET nombre = ?, apellido = ? WHERE id = '$id'",
        'error_required_msg' => 'Debe insertar todos los datos',
    ));
    return $setRegistro;
}

function selectRegistrosById($id){
    $selectFacturas = cm_select(array(
        'all' => 'true',
        'sql' => "SELECT * FROM registros WHERE id = '$id' AND status > 0"
    )); 
    return $selectFacturas;
}

function deleteRegistro($id){
    $deleteFactura = cm_update(array(
        'sql' => "UPDATE registros SET status = ? WHERE id = '$id'",
        'arrData' => array(0),
    ));
    return $deleteFactura;
}