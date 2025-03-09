<?php

class Permisos extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    //TODO:
    //Resolver problema con el seteo de modulos, tanto para cuando se setean swiches en cualquier parte de la tabla
    //como también cuando no se setea nada y queda vacío.
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