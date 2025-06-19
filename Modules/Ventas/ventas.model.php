<?php

function setBill($id){

    $config = cm_select([
        'all' => 'true',
        'sql' => "SELECT config FROM almacenes WHERE id = '$id'",
    ]);

    $config = $config[0]['config'];



    if (!empty($config)) {

        $config = json_decode($config,true);

        foreach ($config as $field) {
            if (empty($field) && $field !== 0) {
                return false;
                die();
            }
        }

        $master = cm_set([
            'type' => 'post',
            'mysql_type' => 'insert',
            'data' => [
                'id' => ['required' => false, 'value' => uniqid('',true)],
                'modify_by' => ['required' => false, 'value' => getUser('id')],
                'status' => ['required' => false, 'value' => 1],
                'imagen' => ['required' => false, 'value' => ''],
                'titulo' => ['required' => false, 'value' => $config['title']],
                'subtitulo' => ['required' => false, 'value' => $config['secondTitle']],
                'nombre_reporte' => ['required' => false, 'value' => $config['documentType']],
                'nombre_almacen' => ['required' => false, 'value' => $config['storeName']],
                'nit' => ['required' => false, 'value' => $config['storeNit']],
                'direccion' => ['required' => false, 'value' => $config['storeAddress']],
                'telefono' => ['required' => false, 'value' => $config['storePhone']],
                'email' => ['required' => false, 'value' => $config['storeEmail']],
                'pagina_web' => ['required' => false, 'value' => BASE_URL],
                'prefijo_consecutivo' => ['required' => false, 'value' => $config['reportSuffix']],
                'autor' => ['required' => false, 'value' => getUser('nombres').' '.getUser('apellidos')],

                'cliente' => ['required' => true],
                'identidad_cliente' => ['required' => true],
                'telefono_cliente' => ['required' => true],
                'metodoPago' => ['required' => true],
                'descuento' => ['required' => true],
                'totalBase' => ['required' => false],
                'impuesto' => ['required' => false],
                'abono' => ['required' => true],
                'total' => ['required' => true],
                'comentarios' => ['required' => true],
            ],
            'sql' => "INSERT INTO factura_maestro(
                    id, 
                    modify_by, 
                    status, 
                    imagen, 
                    titulo, 
                    subtitulo,
                    nombre_reporte,
                    nombre_almacen,
                    nit,
                    direccion,
                    telefono,
                    email,
                    pagina_web,
                    prefijo_consecutivo,
                    autor,
                    cliente,
                    identidad_cliente,
                    telefono_cliente,
                    tipo_pago,
                    descuento,
                    totalBase,
                    impuesto,
                    abono,
                    total,
                    comentarios
                ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
            'error_required_msg' => 'No se pudo generar la factura, faltan algunos campos por llenar',
        ]);

        return $master;

    }else{
        $config = null;
        return false;
    }
}

function setConfig($id){

    $payload = arrClean($_POST);

    $data = json_encode($payload,JSON_UNESCAPED_UNICODE);

    $response = cm_set([
        'type' => 'post',
        'mysql_type' => 'update',
        'data' => [
            'config' => ['required' => false, 'value' => $data],
        ],
        'sql' => "UPDATE almacenes SET config = ? WHERE id = '$id'",
        'error_exist_msg' => 'No se pudo actualizar la configuración, error al procesar los campos',
    ]);

    return $response; 
}

function getconfig($id){
    $query = cm_select([
        'all' => 'true',
        'sql' => "SELECT config FROM almacenes WHERE id = '$id'",
    ]);

    return $query;
}