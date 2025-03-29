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
}