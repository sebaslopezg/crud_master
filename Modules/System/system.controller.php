<?php 

class System extends Controllers{
    public function __construct(){
        parent::__construct();
    }
//cargar tabla o crear
    public function getModules(){
    cm_model([
        'permitRead' => [
            'msg' => 'No tiene permiso para ver registros',
        ],
        'model' => 'selectModules',
    ]);
    }
}