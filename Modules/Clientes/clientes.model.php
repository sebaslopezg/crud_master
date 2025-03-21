<?php

function listarClientes(){
    $respuesta = cm_select([
        'all' => 'true',
        'sql' => "SELECT * FROM clientes WHERE status > 0",
    ]);

    return $respuesta;
}

function crearCliente(){
    $respuesta = cm_set([
        'type' => 'post',
        'mysql_type' => 'insert',
        'data' => [
            'id' => ['required' => false, 'value' => uniqid('',true)],
            'timestamp' => ['required' => false, 'value' => date("Y-m-d H:i:s")],
            'fecha_modificacion' => ['required' => false, 'value' => date("Y-m-d H:i:s")],
            'creado_por' => ['required' => false, 'value' => getUser('id')],
            'modificado_por' => ['required' => false, 'value' => getUser('id')],
            'txtDocumento' => ['required' => true],
            'txtDireccion' => ['required' => false],
            'txtNombre' => ['required' => true],
            'txtemail' => ['required' => false],
            'txtTelefono' => ['required' => true],
            'status' => ['required' => false, 'value' => 1],
        ],
        'prevent_exist' => [
            'data' => ['txtDocumento'],
            'query' => "SELECT * FROM clientes WHERE documento = ? AND status > 0",
            'error_exist_msg' => 'Ya existe un cliente con ese numero de documento',
        ],
        'sql' => "INSERT INTO clientes(id, timestamp, fecha_modificacion, creado_por, modificado_por, documento, direccion, nombre, email, telefono, status) VALUES(?,?,?,?,?,?,?,?,?,?,?)",
        'error_exist_msg' => 'Algunos campos son obligatorios',
    ]);

    return $respuesta;
}

function actualizarCliente($id){
    $respuesta = cm_set([
        'type' => 'post',
        'mysql_type' => 'update',
        'data' => [
            'fecha_modificacion' => ['required' => false, 'value' => date("Y-m-d H:i:s")],
            'modificado_por' => ['required' => false, 'value' => getUser('id')],
            'txtDocumento' => ['required' => true],
            'txtDireccion' => ['required' => false],
            'txtNombre' => ['required' => true],
            'txtemail' => ['required' => false],
            'txtTelefono' => ['required' => true],
        ],
        'sql' => "UPDATE clientes SET fecha_modificacion = ?, modificado_por = ?, documento = ?, direccion = ?, nombre = ?, email = ?, telefono = ? WHERE id = '$id' AND status > 0",
        'error_exist_msg' => 'Algunos campos son obligatorios',
    ]);

    return $respuesta;
}

function eliminarCliente($id){
    $res = cm_update([
        'sql' => "UPDATE clientes SET status = ? WHERE id = '$id'",
        'arrData' => [$id],
    ]);
}

function listarClienteId($id){
    $respuesta = cm_select([
        'all' => 'true',
        'sql' => "SELECT * FROM clientes WHERE id='$id' AND status > 0",
    ]);

    return $respuesta;
}