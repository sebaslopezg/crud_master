<?php

function insertUsuario(){
    $setUsuario = cm_set(array(
        'type' => 'post',
        'mysql_type' => 'insert',
        'data' => array(
            'id' => array('required' => false, 'value' => uniqid('',true)),
            'txtDocumento' => array('required' => true),
            'tipoDocumento' => array('required' => true, 'required_values' => array(
                'Cedula',
                'Tarjeta de identidad',
                'Pasaporte',
            )),
            'txtNombre' => array('required' => true),
            'txtApellido' => array('required' => true),
            'txtEmail' => array('required' => true),
            'txtPass' => array('required' => true, 'hash' => 'SHA256'),
            'status' => array('required' => false, 'value' => 1),
        ),
        'prevent_exist' => array(
            'data' => array('txtDocumento','txtEmail'),
            'query' => "SELECT * FROM usuarios WHERE documento = ? OR email = ?",
            'error_exist_msg' => 'Ya existe un usuario con ese documento o Correo electronico',
        ),
        'sql' => "INSERT INTO usuarios (id, documento, tipo_documento,nombres, apellidos, email, password, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
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

function getUsuario($id){
    $getUsuario = cm_select(array(
        'all' => 'true',
        'sql' => "SELECT id, documento, tipo_documento,nombres, apellidos, email, status FROM usuarios WHERE id = '$id' AND status > 0",
    ));
    return $getUsuario;
}

function updateUsuario($id){
    $setUsuario = cm_set(array(
        'type' => 'post',
        'mysql_type' => 'update',
        'data' => array(
            'tipoDocumento' => array('required' => true, 'required_values' => array(
                'Cedula',
                'Tarjeta de identidad',
                'Pasaporte',
            )),
            'txtNombre' => array('required' => true),
            'txtApellido' => array('required' => true),
            'txtEmail' => array('required' => true),
            'txtPass' => array('required' => false, 'hash' => 'SHA256'),
        ),
        'sql' => "UPDATE usuarios SET tipo_documento = ?, nombres = ?, apellidos = ?, email = ?, password = ? WHERE id = '$id'",
        'error_required_msg' => 'Debe insertar todos los datos',
    ));
    return $setUsuario;
}

function deleteUsuario($id){
    $deleteUsuario = cm_update(array(
        'sql' => "UPDATE usuarios SET status = ? WHERE id = '$id'",
        'arrData' => array(0),
    ));
    return $deleteUsuario;
}