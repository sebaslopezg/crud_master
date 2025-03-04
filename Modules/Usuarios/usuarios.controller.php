<?php 

class Usuarios extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function usuarios(){

        cm_page(array(
            'class' => $this,
            'page_title' => 'Usuarios',
            'page_id' => 'usuarios',
            'view' => 'usuarios',
            'script' => 'usuarios',
        ));
    }

    public function crearUsuario(){
        cm_model(array(
            'model' => insertUsuario(),
            'return' => array(
                'true' => array(
                    'msg' => 'Usuario creado',
                    'showData' => 'true',
                ),
                'false' => array(
                    'msg' => 'No se pudo crear el usuario',
                    'showData' => 'false',
                )
            )
        ));
    }

    public function listarUsuarios(){
        cm_model(array(
            'model' => getUsuarios(),
        ));
    }

    public function traerUsuario($id){
        cm_model(array(
            'model' => getUsuario($id),
        ));
    }

    public function eliminarUsuario($id){
        cm_model(array(
            'model' => deleteUsuario($id),
            'return' => array(
                'true' => array(
                    'msg' => 'Usuario eliminado',
                    'showData' => 'true',
                ),
                'false' => array(
                    'msg' => 'No se pudo eliminar el usuario',
                    'showData' => 'true',
                )
            )
        ));
    }
}