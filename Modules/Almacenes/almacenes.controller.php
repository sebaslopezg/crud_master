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
}