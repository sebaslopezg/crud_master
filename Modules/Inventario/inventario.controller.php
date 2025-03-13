<?php

class Inventario extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function inventario(){

        cm_page(array(
            'class' => $this,
            'login' => array(
                'module' => 'inventario',
                'relocate' => 'login',
            ),
            'page_title' => 'Mis inventarios xD',
            'page_id' => 'inventario',
            'view' => 'inventario',
        ));

    }
}