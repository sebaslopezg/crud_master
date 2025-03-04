<?php 

class Home extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function home(){

        cm_page(array(
            'class' => $this,
            'page_title' => 'Mi home',
            'page_id' => 'home',
            'view' => 'home',
        ));
    }
}