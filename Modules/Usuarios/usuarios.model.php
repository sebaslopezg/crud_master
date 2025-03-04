<?php

function insertUsuario(){
    $setUsuario = cm_set(array(
        'type' => 'post',
        'mysql_type' => 'insert',
        'data' => array(
            'id' => array('required' => false, 'value' => uniqid('',true)),
            'txtDocumento' => array('required' => true),
            'txtNombre' => array('required' => true),
            'txtApellido' => array('required' => true),
            'status' => array('required' => false, 'value' => 1),
        ),
        'sql' => "INSERT INTO usuarios (id, documento,nombres, apellidos, status) VALUES (?, ?, ?, ?, ?)",
        'error_required_msg' => 'Debe insertar todos los datos',
    ));
    return $setUsuario;
}

function getUsuarios(){
    $getUsuarios = cm_select(array(
        'all' => 'true',
        'sql' => "SELECT * FROM usuarios WHERE status > 0",
    ));
    return $getUsuarios;
}

function deleteUsuario($id){
    $deleteUsuario = cm_update(array(
        'sql' => "UPDATE usuarios SET status = ? WHERE id = '$id'",
        'arrData' => array(0),
    ));
    return $deleteUsuario;
}