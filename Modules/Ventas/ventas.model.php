<?php

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