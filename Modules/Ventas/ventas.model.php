<?php

function setBill($id){

    $facturaLocal = cm_select([
        'all' => 'true',
        'sql' => "SELECT factura_local FROM almacenes WHERE id = '$id'"
    ]);

    $config = cm_select([
        'all' => 'true',
        'sql' => "SELECT config FROM almacenes WHERE id = '$id'",
    ]);

    $config = $config[0]['config'];
    $facturaLocal = $facturaLocal[0]['factura_local'];

    if (!empty($config)) {

        $response = ['status' => false, 'msg' => 'Error desconocido'];
        $config = json_decode($config,true);

        foreach ($config as $field) {
            if (empty($field) && $field !== 0) {
                $response = ['status' => false, 'msg' => 'Faltan algunos datos de configuración de la factura'];
            }
        }

        $facturaId = uniqid('',true);

        $master = cm_set([
            'type' => 'post',
            'mysql_type' => 'insert',
            'data' => [
                'id' => ['required' => false, 'value' => $facturaId],
                'modify_by' => ['required' => false, 'value' => getUser('id')],
                'status' => ['required' => false, 'value' => 1],
                'almacen_id' => ['required' => false, 'value' => $id],
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
                'descuento' => ['required' => false],
                'subtotal' => ['required' => false],
                'impuesto' => ['required' => false],
                'abono' => ['required' => true],
                'total' => ['required' => true],
                'comentarios' => ['required' => false],
            ],
            'sql' => "INSERT INTO factura_maestro(
                    id, 
                    modify_by, 
                    status, 
                    almacen_id,
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
                    subtotal,
                    iva,
                    abono,
                    total,
                    comentario
                ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
            'error_required_msg' => 'No se pudo generar la factura, faltan algunos campos por llenar',
        ]);

        $response = $master;
        $masterStatus = false;

        if (is_array($response)) {
            $masterStatus = false;
        }else{
            $masterStatus = true;
        }

        if (isset($_POST['items']) && $masterStatus) {
            $items = $_POST['items'];
            $items = json_decode($items,true);

            foreach ($items as $item) {
                $responseItem = cm_set([
                    'type' => 'post',
                    'mysql_type' => 'insert',
                    'data' => [
                        'id' => ['required' => false, 'value' => uniqid('',true)],
                        'factura_maestro_id' => ['required' => false, 'value' => $facturaId],
                        'producto_id' => ['required' => false, 'value' => $item['id']],
                        'producto_codigo' => ['required' => false, 'value' => $item['code']],
                        'producto_nombre' => ['required' => false, 'value' => $item['itemName']],
                        'cantidad' => ['required' => false, 'value' => $item['stock']],
                        'total' => ['required' => false, 'value' => $item['total']],
                        'status' => ['required' => false, 'value' => 1],
                    ],
                    'sql' => "INSERT INTO factura_detalle(
                        id,
                        factura_maestro_id,
                        producto_id,
                        producto_codigo,
                        producto_nombre,
                        cantidad,
                        total,
                        status
                    ) VALUES(?,?,?,?,?,?,?,?)",
                ]);
            }
        }

    }else{
        $response = ['status' => false, 'msg' => 'Configuración de factura incompleta'];
    }
    return $response;
}

function getbills($idStore){
    $response = cm_select([
        'all' => 'true',
        'sql' => "SELECT 
            id, 
            titulo, 
            autor, 
            cliente, 
            identidad_cliente, 
            total,
            comentario
            FROM factura_maestro WHERE almacen_id = '$idStore'
        ",
    ]);
    return $response;
}

function getbill($idStore, $idFactura){
    $response = cm_select([
        'all' => 'true',
        'sql' => "SELECT * FROM factura_maestro WHERE almacen_id = '$idStore' AND id ='$idFactura' AND status > 0",
    ]);
    return $response;
}

function getbilldetail($idStore, $idFactura){
    $response = cm_select([
        'all' => 'true',
        'sql' => "SELECT * FROM factura_detalle WHERE factura_maestro_id ='$idFactura' AND status > 0",
    ]);
    return $response;
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
        'error_required_msg' => 'No se pudo actualizar la configuración, error al procesar los campos',
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

function anulargeneral($factura){
    $deleteUsuario = cm_update([
        'sql' => "UPDATE factura_maestro SET status = ? WHERE id = '$factura'",
        'arrData' => array(2),
    ]);
    return $deleteUsuario;
}