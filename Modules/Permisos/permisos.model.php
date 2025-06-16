<?php

function setPermisosModel($id){
    $deletePermisos = cm_delete([
        'sql' => "DELETE FROM permisos WHERE rol_id = '$id'",
    ]);

    $modulos = $_POST['modulos'];
    $idRol = $_POST['rolId'];

     foreach ($modulos as $key => $value) {
        $idModulo = $key;
        $r = isset($value['r']) ? 1 : 0;
        $w = isset($value['w']) ? 1 : 0;
        $u = isset($value['u']) ? 1 : 0;
        $d = isset($value['d']) ? 1 : 0;
        $requestInsert = cm_set([
            'type' => 'post',
            'mysql_type' => 'insert',
            'data' => [
                'id' => ['required' => false, 'value' => uniqid()],
                'rol_id' => ['required' => false, 'value' => $idRol],
                'modulo_id' => ['required' => false, 'value' => $idModulo],
                'r' => ['required' => false, 'value' => $r],
                'w' => ['required' => false, 'value' => $w],
                'u' => ['required' => false, 'value' => $u],
                'd' => ['required' => false, 'value' => $d],
            ],
            'sql' => "INSERT INTO permisos (id, rol_id, modulo_id, r, w, u, d) VALUES(?,?,?,?,?,?,?)",
            'error_required_msg' => 'No es posible asignar los permisos',
        ]);
    } 
    return $requestInsert;
}

//TODO:: Corregir error en selectPermisoso
function selectPermisos($id){
    $response;
    $arrPermisosRol = cm_select([
        'all' => 'true',
        'sql' => "SELECT * FROM permisos WHERE rol_id = '$id'"
    ]);

    $arrModulos = cm_select([
        'all' => 'true',
        'sql' => "SELECT * FROM modulos"
    ]);

    $arrPermisos = ['r' => 0, 'w' => 0, 'u' => 0, 'd' => 0];

     if (empty($arrPermisosRol)) {

        for ($i=0; $i < count($arrModulos); $i++) {
            foreach ($arrPermisos as $key => $value) {
                $arrModulos[$i][$key] = $value;
            } 
        }
    }else{
         for ($i=0; $i < count($arrModulos); $i++) { 
            $arrPermisos = ['r' => 0, 'w' => 0, 'u' => 0, 'd' => 0];
            
            foreach ($arrPermisosRol as $key => $value) {
                if ($arrModulos[$i]['id'] == $value['modulo_id']) {
                    $arrPermisos = array(
                        'r' => $value['r'],
                        'w' => $value['w'],
                        'u' => $value['u'],
                        'd' => $value['d'],
                    );
                    break;
                }
            }

            foreach ($arrPermisos as $key => $value) {
                $arrModulos[$i][$key] = $value;
            } 
        }
    } 

    $response = $arrModulos;
    return $response;
}

function permisosModulo($idRol){

    $request = cm_select([
        'all' => 'true',
        'sql' => "SELECT p.rol_id,
                p.modulo_id,
                m.nombre as modulo,
                p.r,
                p.w,
                p.u,
                p.d
                FROM permisos p
                INNER JOIN modulos m
                ON p.modulo_id = m.id
                WHERE p.rol_id = '$idRol'"
    ]);

     $arrPermisos = array();

    for ($i=0; $i < count($request); $i++) { 
        $arrPermisos[$request[$i]['modulo_id']] = $request[$i];
    }

    $arrPermisos = $request;

    return $arrPermisos;
}
