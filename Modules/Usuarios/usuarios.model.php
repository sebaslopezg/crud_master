<?php

function insertUsuario(){
    $setUsuario = cm_set([
        'type' => 'post',
        'mysql_type' => 'insert',
        'data' => [
            'id' => ['required' => false, 'value' => uniqid('',true)],
            'txtDocumento' => ['required' => true],
            'tipoDocumento' => ['required' => true, 'required_values' => [
                'Cedula',
                'Tarjeta de identidad',
                'Pasaporte',
            ]],
            'txtNombre' => ['required' => true],
            'txtApellido' => ['required' => true],
            'txtEmail' => ['required' => true],
            'txtPass' => ['required' => true, 'hash' => 'SHA256'],
            'tipoRol' => ['required' => true],
            'status' => ['required' => false, 'value' => 1],
        ],
        'prevent_exist' => [
            'data' => ['txtDocumento','txtEmail'],
            'query' => "SELECT * FROM usuarios WHERE documento = ? OR email = ?",
            'error_exist_msg' => 'Ya existe un usuario con ese documento o Correo electronico',
        ],
        'sql' => "INSERT INTO usuarios (id, documento, tipo_documento,nombres, apellidos, email, password, rol_id, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)",
        'error_required_msg' => 'Debe insertar todos los datos',
    ]);
    return $setUsuario;
}

function getUsuarios(){
    $getUsuarios = cm_select([
        'all' => 'true',
        'sql' => "SELECT id, documento, nombres, apellidos, (SELECT nombre from roles where id = u.rol_id ) as rol FROM usuarios u WHERE status > 0",
    ]);
    return $getUsuarios;
}

function getUsuario($id){
    $getUsuario = cm_select([
        'all' => 'true',
        'sql' => "SELECT id, documento, tipo_documento,nombres, apellidos, email, rol_id,status FROM usuarios WHERE id = '$id' AND status > 0",
    ]);
    return $getUsuario;
}

function updateUsuario($id){
    $setUsuario = cm_set([
        'type' => 'post',
        'mysql_type' => 'update',
        'data' => [
            'tipoDocumento' => ['required' => true, 'required_values' => [
                'Cedula',
                'Tarjeta de identidad',
                'Pasaporte',
            ]],
            'txtNombre' => ['required' => true],
            'txtApellido' => ['required' => true],
            'txtEmail' => ['required' => true],
            'txtPass' => ['required' => false, 'hash' => 'SHA256'],
            'tipoRol' => ['required' => true],
        ],
        'sql' => "UPDATE usuarios SET tipo_documento = ?, nombres = ?, apellidos = ?, email = ?, password = ?, rol_id = ? WHERE id = '$id'",
        'error_required_msg' => 'Debe insertar todos los datos',
    ]);
    return $setUsuario;
}

function deleteUsuario($id){
    $deleteUsuario = cm_update([
        'sql' => "UPDATE usuarios SET status = ? WHERE id = '$id'",
        'arrData' => array(0),
    ]);
    return $deleteUsuario;
}