<?php

function listarProductos(){
    $respuesta = cm_select([
        'all' => 'true',
        'sql' => "SELECT * FROM productos WHERE status > 0",
    ]);

    return $respuesta;
}

function crearProducto(){
    $respuesta = cm_set([
        'type' => 'post',
        'mysql_type' => 'insert',
        'data' => [
            'id' => ['required' => false, 'value' => uniqid('',true)],
            'timestamp' => ['required' => false, 'value' => date("Y-m-d H:i:s")],
            'txtCodigo' => ['required' => true],
            'txtNombreProducto' => ['required' => true],
            'txtPrecio' => ['required' => true],
            'txtDescripcion' => ['required' => false],
            'txtStatus' => ['required' => true, 'required_values' => [1,2]],
        ],
        'prevent_exist' => [
            'data' => ['txtCodigo'],
            'query' => "SELECT * FROM productos WHERE codigo = ? AND status > 0",
            'error_exist_msg' => 'Ya existe un producto con ese codigo',
        ],
        'sql' => "INSERT INTO productos (id, timestamp, codigo, nombre, precio, descripcion, status) VALUES(?,?,?,?,?,?,?)",
        'error_required_msg' => 'Algunos campos son obligatorios',
    ]);

    return $respuesta;
}

function listarProductoId($id){
    $respuesta = cm_select([
        'all' => 'true',
        'sql' => "SELECT * FROM productos WHERE id = '$id' AND status > 0",
    ]);

    return $respuesta;
}