<?php

class Ventas extends Controllers{
    public function __construct(){
        parent::__construct(); 
    }

    public function almacen($args){
        if ($args != null) {
            $arrParams = explode(",",$args);
            $id = $arrParams[0];
            $almacenDataRaw = cm_select([
                'all' => 'true',
                'sql' => "SELECT * FROM almacenes WHERE id='$id'",
            ]);
            $almacenData = $almacenDataRaw[0];
            $nombreAlmacen = $almacenData['nombre'];
            cm_page([
                'class' => $this,
                'page_title' => "Almacen: $nombreAlmacen",
                'page_id' => 'almacenes',
                'view' => 'ventas',
                'script' => 'ventas',
                'data' => $almacenData,
            ]);
            
        }else{
            header('Location: ' . base_url()."/almacenes" );
        }
    }

    public function setbill($id){
        cm_model([
/*             'permitCreate' => [
                'msg' => 'No tiene permiso para creat facturas',
            ], */
            'model' => 'setBill',
            'args' => [$id],
            'return' => [
                'true' => [
                    'msg' => 'Se ha generado la factura de manera exitosa',
                    'showData' => 'true'
                ],
                'false' => [
                    'msg' => 'Error al intentar generar la factura',
                    'showData' => 'true'
                ]
            ]
        ]);
    }

/*     public function setbillitems($idStore){
        cm_model([
            'model' => 'setBillItems',
            'args' => [$idStore],
            'return' => [
                'true' => [
                    'msg' => 'Se ha guardado el item de la factura de manera exitosa',
                    'showData' => 'false'
                ],
                'false' => [
                    'msg' => 'Error al intentar generar el item',
                    'showData' => 'true'
                ]
            ]
        ]);
    } */

    public function getbills($idStore){
        cm_model([
            'model' => 'getbills',
            'args' => [$idStore],
        ]);
    }

    public function getbill($args){
        if ($args != null) {
            $arrParams = explode(",",$args);
            $idStore = $arrParams[0];
            $idBill = $arrParams[1];

        cm_model([
            'model' => 'getbill',
            'args' => [$idStore, $idBill],
        ]);
        }

    }

    public function getbilldetail($args){
        if ($args != null) {
            $arrParams = explode(",",$args);
            $idStore = $arrParams[0];
            $idBill = $arrParams[1];

        cm_model([
            'model' => 'getbilldetail',
            'args' => [$idStore, $idBill],
        ]);
        }

    }

    public function setconfig($id){
        cm_model([
            'model' => 'setConfig',
            'args' => [$id],
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

    public function getconfig($id){
        cm_model([
            'model' => 'getconfig',
            'args' => [$id],
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