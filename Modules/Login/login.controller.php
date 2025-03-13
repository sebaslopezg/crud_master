<?php 

class Login extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function login(){

        cm_page(array(
            'class' => $this,
            'page_title' => 'Login',
            'page_id' => 'login',
            'view' => 'login',
            'script' => 'login',
        ));
    }

    public function loginUser(){
        $post = $_POST;
         cm_model(array(
            'model' => userLogin($post),
            'response' => array(
                'true' => array(
                    'msg' => 'Sesion iniciada',
                    'showData' => 'false',
                ),
                'false' => array(
                    'msg' => 'Error',
                    'showData' => 'true',
                ),
            ),
        ));
        
    } 
}