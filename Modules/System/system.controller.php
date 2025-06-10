<?php 

class System extends Controllers{
    public function __construct(){
        parent::__construct();
        parent::schema();
    }

    public function getModules(){
        cm_model([
            'permitRead' => [
                'msg' => 'No tiene permiso para ver registros',
            ],
            'model' => 'selectModules',
        ]);
    }
}