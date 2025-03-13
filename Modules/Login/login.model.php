<?php

function userLogin($post){
 
    if (!isset($post['usuario']) || !isset($post['password']) || empty($post['usuario']) || empty($post['password'])) {
        $arrResponse = array('status' => false, 'msg' => 'Error de datos');
    }else{
        $usuario = strtolower(strClean($post['usuario']));
        $password = hash("SHA256", strClean($post['password']));

        $requestUser = cm_select(array(
            'all' => 'false',
            'sql' => "SELECT id, status FROM usuarios WHERE
            email = '$usuario' AND
            password = '$password' AND
            status != 0",
        ));
    
        if (empty($requestUser)) {
            $arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña es incorrecta');
        }else{
            $arrData = $requestUser;
            if ($arrData['status'] == 1) {
                $_SESSION['idUser'] = $arrData['id'];
                $_SESSION['login'] = true;
    
                $idUser = $_SESSION['idUser'];
    
                $arrData = cm_select(array(
                    'all' => 'false',
                    'sql' => "SELECT 
                    u.id, 
                    u.documento, 
                    u.nombres, 
                    u.apellidos, 
                    u.email, 
                    u.rol_id, 
                    (SELECT r.nombre from roles r WHERE r.id = u.rol_id) AS rol, 
                    u.status 
                    FROM usuarios u 
                    WHERE u.id = '$idUser'",
                ));
    
                $_SESSION['userData'] = $arrData;
    
                $arrResponse = array('status' => true, 'msg' => 'Sesion iniciada');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Usuario inactivo');
            }
        }
    } 


    return $arrResponse;

}