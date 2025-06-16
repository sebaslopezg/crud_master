<?php 

class Home extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function home(){

        cm_page([
            'class' => $this,
            'page_title' => 'Mi home',
            'page_id' => 'home',
            'view' => 'home',
        ]);
    }
}