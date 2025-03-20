<?php

class Clientes extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function clientes(){
        cm_page([
            'class' => $this,
            'page_title' => 'Clientes',
            'page_id' => 'clientes',
            'view' => 'clientes',
            'script' => 'clientes',
        ]);
    }
}