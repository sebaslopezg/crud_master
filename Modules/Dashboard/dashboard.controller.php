<?php 

class Dashboard extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function dashboard(){

        cm_page(array(
            'class' => $this,
             'login' => array(
                'module' => 'dashboard',
                'relocate' => 'login',
            ), 
            'page_title' => 'Dashboard',
            'page_id' => 'dashboard',
            'view' => 'dashboard',
        ));
    }
}