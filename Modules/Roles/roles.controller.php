<?php

class Roles extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function roles(){
        cm_page(array(
            'class' => $this,
             'login' => array(
                'module' => 'roles',
                'relocate' => 'login',
            ),
            'permitRead' => array(
                'relocate' => 'home',
            ), 
            'page_title' => 'Roles de usuario',
            'page_id' => 'roles',
            'view' => 'roles',
            'script' => 'roles',
        ));
    }

    public function crearRol(){
        cm_model(array(
/*             'permitCreate' => array(
                'msg' => 'No tiene permiso para crear roles',
            ), */
            'model' => 'insertRol',
            'return' => array(
                'true' => array(
                    'msg' => 'Rol creado exitosamente',
                    'showData' => 'true',
                ),
                'false' => array(
                    'msg' => 'No se pudo crear el rol',
                    'showData' => 'true',
                ),
            ),
        ));
    }

    public function listarRoles(){
        cm_model(array(
/*             'permitRead' => [
                'msg' => 'No tiene permiso para ver esto',
            ], */
            'model' => 'getRoles',
        ));
    }

    public function listarRolId($id){
        cm_model(array(
/*             'permitRead' => [
                'msg' => 'No tiene permiso para ver esto',
            ], */
            'model' => 'getRolId',
            'args' => [$id],
        ));
    }

    public function actualizarRol($id){
        cm_model(array(
/*             'permitUpdate' => [
                'msg' => 'No tiene permiso para actualizar los roles',
            ], */
            'model' => 'updateRol',
            'args' => [$id],
            'return' => array(
                'true' => array(
                    'msg' => 'Rol actualizado exitosamente',
                    'showData' => 'true',
                ),
                'false' => array(
                    'msg' => 'No se pudo actualizar el rol',
                    'showData' => 'true',
                ),
            ),
        ));
    }

    public function eliminarRol($id){
        cm_model(array(
/*             'permitRead' => [
                'msg' => 'No tiene permiso para eliminar roles',
            ], */
            'model' => 'deleteRol',
            'args' => [$id],
            'return' => array(
                'true' => array(
                    'msg' => 'Rol eliminado exitosamente',
                    'showData' => 'true',
                ),
                'false' => array(
                    'msg' => 'No se pudo eliminar el rol',
                    'showData' => 'true',
                ),
            ),
        ));
    }
}