<?php 

class Usuarios extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function usuarios(){
        cm_page([
            'class' => $this,
             'login' => [
                'module' => 'usuarios',
                'relocate' => 'home',
             ],
            'permitRead' => [
                'relocate' => 'home',
            ], 
            'page_title' => 'Usuarios',
            'page_id' => 'usuarios',
            'view' => 'usuarios',
            'script' => 'usuarios',
        ]);
    }

    public function crearUsuario(){
        cm_model([
                'permitCreate' => [
                'msg' => 'No tiene permiso para crear usuarios',
            ],
            'model' => 'insertUsuario',
            'return' => [
                'true' => [
                    'msg' => 'Usuario creado',
                    'showData' => 'true',
                ],
                'false' => [
                    'msg' => 'No se pudo crear el usuario',
                    'showData' => 'true',
                ]
            ]
        ]);
    }

    public function listarUsuarios(){
        cm_model([
            'permitRead' => [
                'msg' => 'No tiene permisos para ver esto',
            ],
            'model' => 'getUsuarios',
        ]);
    }

    public function traerUsuario($id){
        cm_model([
            'permitRead' => [
                'msg' => 'No tiene permisos para ver esto',
            ],
            'model' => 'getUsuario',
            'args' => [$id],
        ]);
    }

    public function actualizarUsuario($id){
        cm_model([
            'permitUpdate' => [
                'msg' => 'No tiene permisos para actualizar usuarios',
            ],
            'model' => 'updateUsuario',
            'args' => [$id],
            'return' => [
                'true' => [
                    'msg' => 'Registro actualizado',
                    'showData' => 'true',
                ],
                'false' => [
                    'msg' => 'No se pudo actualizar el registro',
                    'showData' => 'true',
                ]
            ]
        ]);
    }

    public function eliminarUsuario($id){
        cm_model([
            'permitDelete' => [
                'msg' => 'No tiene permisos para eliminar usuarios',
            ],
            'model' => 'deleteUsuario',
            'args' => [$id],
            'return' => [
                'true' => [
                    'msg' => 'Usuario eliminado',
                    'showData' => 'true',
                ],
                'false' => [
                    'msg' => 'No se pudo eliminar el usuario',
                    'showData' => 'true',
                ]
            ]
        ]);
    }
}