<?php 

class Dashboard extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function dashboard(){

        cm_setModule([
            'id' => 'dashboard',
            'name' => 'Dashboard',
            'description' => 'El dashboard de la pagina'
        ]);

        cm_page([
            'class' => $this,
             'login' => [
                'module' => 'dashboard',
                'relocate' => 'login',
             ], 
            'page_title' => 'Dashboard',
            'page_id' => 'dashboard',
            'view' => 'dashboard',
        ]);
    }
}