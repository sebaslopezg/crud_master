<?php

function selectRegistros(){
    $selectFacturas = cm_select([
        'all' => 'true',
        'sql' => 'SELECT * FROM registros WHERE status > 0'
    ]); 
    return $selectFacturas;
}

function insertRegistro(){
    $setRegistro = cm_set([
        'type' => 'post',
        'mysql_type' => 'insert',
        'data' => [
            'id' => ['required' => false, 'value' => uniqid('',true)],
            'txtNombre' => ['required' => true],
            'txtApellido' => ['required' => true],
            'status' => ['required' => false, 'value' => 1],
        ],
        'sql' => "INSERT INTO registros (id, nombre, apellido, status) VALUES (?, ?, ?, ?)",
        'error_required_msg' => 'Debe insertar todos los datos',
    ]);
    return $setRegistro;
}

function updateRegistro($id){
    $setRegistro = cm_set([
        'type' => 'post',
        'mysql_type' => 'update',
        'data' => [
            'txtNombre' => ['required' => true],
            'txtApellido' => ['required' => true],
        ],
        'sql' => "UPDATE registros SET nombre = ?, apellido = ? WHERE id = '$id'",
        'error_required_msg' => 'Debe insertar todos los datos',
    ]);
    return $setRegistro;
}

function selectRegistrosById($id){
    $selectFacturas = cm_select([
        'all' => 'true',
        'sql' => "SELECT * FROM registros WHERE id = '$id' AND status > 0"
    ]); 
    return $selectFacturas;
}

function deleteRegistro($id){
    $deleteFactura = cm_update([
        'sql' => "UPDATE registros SET status = ? WHERE id = '$id'",
        'arrData' => array(0),
    ]);
    return $deleteFactura;
}