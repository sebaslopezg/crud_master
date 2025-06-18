<?php

class Almacenes extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function almacenes(){
        cm_page([
            'class' => $this,
            'page_title' => 'Almacenes',
            'page_id' => 'almacenes',
            'view' => 'almacenes',
            'script' => 'almacenes',
        ]);
    }

    public function create(){
        cm_model([
            'model' => 'create',
            'return' => [
                'true' => [
                    'msg' => 'Almacen creado',
                    'showData' => 'false'
                ],
                'false' => [
                    'msg' => 'Error',
                    'showData' => 'true'
                ],
            ],
        ]);
    }

    public function view(){
        cm_model([
            'model' => 'view',
        ]);
    }

    public function setconfig(){
        cm_model([
            'model' => 'setConfig',
            'return' => [
                'true' => [
                    'msg' => 'Se ha guardado la configuración',
                    'showData' => 'false'
                ],
                'false' => [
                    'msg' => 'Error al intentar guardar la configuración',
                    'showData' => 'true'
                ],
            ],
        ]);
    }

    public function getconfig(){
        cm_model([
            'model' => 'getconfig',
            'return' => [
                'true' => [
                    'msg' => 'Se ha guardado la configuración',
                    'showData' => 'false'
                ],
                'false' => [
                    'msg' => 'Error al intentar guardar la configuración',
                    'showData' => 'true'
                ],
            ],
        ]);
    }
}