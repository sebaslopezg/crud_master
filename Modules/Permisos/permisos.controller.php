<?php

class Permisos extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function setPermisos($id){
        cm_model(array(
            'model' => setPermisosModel($id),
            'return' => array(
                'true' => array(
                    'msg' => 'Permisos Asignados',
                    'ShowData' => 'false',
                ),
                'false' => array(
                    'msg' => 'error al asignar permisos',
                    'ShowData' => 'true',
                ),
            ),
        ));
    }

    public function getPermiso($id){
        cm_model(array(
            'model' => selectPermisos($id),
        ));
    }
}