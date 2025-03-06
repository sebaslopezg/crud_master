<?php

class Roles extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function roles(){
        cm_page(array(
            'class' => $this,
            'page_title' => 'Roles',
            'page_id' => 'roles',
            'view' => 'roles',
            'script' => 'roles',
        ));
    }

    public function crearRol(){
        cm_model(array(
            'model' => insertRol(),
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
            'model' => getRoles(),
        ));
    }

    public function listarRolId($id){
        cm_model(array(
            'model' => getRolId($id),
        ));
    }

    public function actualizarRol($id){
        cm_model(array(
            'model' => updateRol($id),
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
            'model' => deleteRol($id),
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