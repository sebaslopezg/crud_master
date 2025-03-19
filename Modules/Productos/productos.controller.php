<?php

class Productos extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function productos(){

        cm_page(array(
            'class' => $this,
            'page_title' => 'Mis inventarios xD',
            'page_id' => 'productos',
            'view' => 'productos',
        ));
    }
}