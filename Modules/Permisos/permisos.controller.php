<?php

class Permisos extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    //TODO:
    //Resolver problema con el seteo de modulos, tanto para cuando se setean swiches en cualquier parte de la tabla
    //como también cuando no se setea nada y queda vacío.
    public function setPermisos($id){
        cm_model([
            'model' => 'setPermisosModel',
            'args' => [$id],
            'return' => [
                'true' => [
                    'msg' => 'Permisos Asignados',
                    'ShowData' => 'false',
                ],
                'false' => [
                    'msg' => 'error al asignar permisos',
                    'ShowData' => 'true',
                ],
            ],
        ]);
    }

    public function getPermiso($id){
        cm_model([
            'model' => 'selectPermisos',
            'args' => [$id],
        ]);
    }
}