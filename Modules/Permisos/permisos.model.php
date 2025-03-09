<?php

function setPermisosModel($id){
    $deletePermisos = cm_delete(array(
        'sql' => "DELETE FROM permisos WHERE rol_id = '$id'",
    ));

    $modulos = $_POST['modulos'];
    $idRol = $_POST['rolId'];

     foreach ($modulos as $key => $value) {
        $idModulo = $key;
        $r = isset($value['r']) ? 1 : 0;
        $w = isset($value['w']) ? 1 : 0;
        $u = isset($value['u']) ? 1 : 0;
        $d = isset($value['d']) ? 1 : 0;
        $requestInsert = cm_set(array(
            'type' => 'post',
            'mysql_type' => 'insert',
            'data' => array(
                'id' => array('required' => false, 'value' => uniqid()),
                'rol_id' => array('required' => false, 'value' => $idRol),
                'modulo_id' => array('required' => false, 'value' => $idModulo),
                'r' => array('required' => false, 'value' => $r),
                'w' => array('required' => false, 'value' => $w),
                'u' => array('required' => false, 'value' => $u),
                'd' => array('required' => false, 'value' => $d),
            ),
            'sql' => "INSERT INTO permisos (id, rol_id, modulo_id, r, w, u, d) VALUES(?,?,?,?,?,?,?)",
            'error_required_msg' => 'No es posible asignar los permisos',
        ));
    } 
    return $requestInsert;
}

//TODO:: Corregir error en selectPermisoso
function selectPermisos($id){
    $response;
    $arrPermisosRol = cm_select(array(
        'all' => 'true',
        'sql' => "SELECT * FROM permisos WHERE rol_id = '$id'"
    ));

    $arrModulos = cm_select(array(
        'all' => 'true',
        'sql' => "SELECT * FROM modulos"
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
            //if: isset($arrPermisosRol[$i])
            foreach ($arrPermisosRol as $permiso) {
                if ($permiso['modulo_id'] == $arrModulos['id']) {
                    $arrPermisos = array(
                        'r' => $arrPermisosRol[$i]['r'],
                        'w' => $arrPermisosRol[$i]['w'],
                        'u' => $arrPermisosRol[$i]['u'],
                        'd' => $arrPermisosRol[$i]['d'],
                    );
                }
            }

/*             if (isset($arrPermisosRol[$i])) {
                $arrPermisos = array(
                    'r' => $arrPermisosRol[$i]['r'],
                    'w' => $arrPermisosRol[$i]['w'],
                    'u' => $arrPermisosRol[$i]['u'],
                    'd' => $arrPermisosRol[$i]['d'],
                );
            }  */

            foreach ($arrPermisos as $key => $value) {
                $arrModulos[$i][$key] = $value;
            } 
        }
    }

    $response = $arrModulos;
    return $response;
}

