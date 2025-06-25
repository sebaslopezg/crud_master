<?php

function create(){

    $query = cm_select([
        'all' => 'true',
        'sql' => "SELECT config_value FROM config WHERE config_key = 'configBillReport'",
    ]);

    $storeConfig = $query[0]['config_value'];

    empty($storeConfig) ?  $configValue = '' : $configValue = $storeConfig;

    $response = cm_set([
        'type' => 'post',
        'mysql_type' => 'insert',
        'data' => [
            'id' => ['required' => false, 'value' => uniqid('',false)],
            'modify_date' => ['required' => false, 'value' => date("Y-m-d H:i:s")],
            'modify_by' => ['required' => false, 'value' => getUser('id')],
            'selStatus' => ['required' => true, 'required_values' => [1,2]],
            'txtNombre' => ['required' => true],
            'txtDescripcion' => ['required' => true],
            'config' => ['required' => false, 'value' => $configValue],
        ],
        'sql' => "INSERT INTO almacenes(id, modify_date, modify_by, status, nombre, descripcion, config) VALUES(?,?,?,?,?,?,?)",
        'error_exist_msg' => 'Algunos campos son obligatorios',
    ]);

    return $response;
}

function view(){
    $response = cm_select([
        'all' => 'true',
        'sql' => "SELECT id, nombre, descripcion, status FROM almacenes WHERE status > 0",
    ]);

    return $response;
}

function setConfig(){

    $payload = arrClean($_POST);


    $data = json_encode($payload,JSON_UNESCAPED_UNICODE);

    $query = cm_select([
        'all' => 'true',
        'sql' => "SELECT * FROM config WHERE config_key = 'configBillReport'",
    ]);

    $response;

    if (empty($query)) {
        $response = cm_set([
            'type' => 'post',
            'mysql_type' => 'insert',
            'data' => [
                'config_key' => ['required' => false, 'value' => 'configBillReport'],
                'config_value' => ['required' => false, 'value' => $data],
            ],
            'sql' => "INSERT INTO config(config_key,config_value) VALUES(?,?)",
            'error_exist_msg' => 'No se pudo guardar el campo "key" o "value" de la configuración',
        ]);
    }else{
        $response = cm_set([
            'type' => 'post',
            'mysql_type' => 'update',
            'data' => [
                'config_value' => ['required' => false, 'value' => $data],
            ],
            'sql' => "UPDATE config SET config_value = ? WHERE config_key = 'configBillReport'",
            'error_exist_msg' => 'No se pudo actualizar la configuración, error al procesar los campos',
        ]);
    }



    return $response; 
}

function getconfig(){
    $query = cm_select([
        'all' => 'true',
        'sql' => "SELECT * FROM config WHERE config_key = 'configBillReport'",
    ]);

    return $query;
}

function deleteOne($id){
    $response = cm_update([
        'sql' => "UPDATE almacenes SET status = ? WHERE id = '$id'",
        'arrData' => array(0),
    ]);
    return $response;
}