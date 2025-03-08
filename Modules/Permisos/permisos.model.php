<?php

function setPermisosModel(){

}

function selectPermisos($id){
    $response;
    $arrPermisosRol = cm_select(array(
        'all' => 'true',
        'sql' => "SELECT * FROM permisos WHERE id = '$id'"
    ));

    $arrModulos = cm_select(array(
        'all' => 'true',
        'sql' => "SELECT * FROM modulos WHERE status > 0"
    ));

    $arrPermisos = array('r' => 0, 'w' => 0, 'u' => 0, 'd' => 0);

    if (empty($arrPermisosRol)) {
        for ($i=0; $i < count($arrModulos); $i++) {
            foreach ($arrPermisos as $key => $value) {
                $arrModulos[$i][$key] = $value;
            } 
        }
    }else{
        for ($i=0; $i < count($arrModulos); $i++) { 
            $arrPermisos = array('r' => 0, 'w' => 0, 'u' => 0, 'd' => 0);
            if (isset($arrPermisosRol[$i])) {
                $arrPermisos = array(
                    'r' => $arrPermisosRol[$i]['r'],
                    'w' => $arrPermisosRol[$i]['w'],
                    'u' => $arrPermisosRol[$i]['u'],
                    'd' => $arrPermisosRol[$i]['d'],
                );
            }
            foreach ($arrPermisos as $key => $value) {
                $arrModulos[$i][$key] = $value;
            } 
        }
    }

    $response = $arrModulos;
    return $response;
}

