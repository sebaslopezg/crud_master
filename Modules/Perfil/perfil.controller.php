<?php

class Perfil extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function perfil(){
        cm_page([
            'class' => $this,
             'login' => [
                'module' => 'perfil',
                'relocate' => 'login',
             ],
            'permitRead' => [
                'relocate' => 'home',
            ], 
            'page_title' => 'Perfil',
            'page_id' => 'perfil',
            'view' => 'perfil',
            'script' => 'perfil',
        ]);
    }
}