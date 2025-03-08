<?php

class Permisos extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function setPermisos(){
        cm_model(array(
            'model' => setPermisosModel(),
            'return' => array(
                'true' => array(
                    'msg' => 'Permisos Asignados',
                    'ShowData' => 'true',
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