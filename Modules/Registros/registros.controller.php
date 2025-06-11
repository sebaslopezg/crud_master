<?php

class Registros extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    
    public function registros(){

        cm_page([
            'class' => $this,
            'login' => [
                'module' => 'registros',
                'relocate' => 'login',
            ],
            'permitRead' => [
                'relocate' => 'home',
            ],
            'page_title' => 'Los registros',
            'page_id' => 'registros',
            'view' => 'registros',
            'script' => 'registros',
        ]);
    }

    public function crearRegistro(){
        cm_model([
            'permitCreate' => [
                'msg' => 'No tiene permiso para actualizar registros',
            ],
            'model' => 'insertRegistro',
            'return' => [
                'true' => [
                    'msg' => 'Registro creado',
                    'showData' => 'false',
                ],
                'false' => [
                    'msg' => 'No se pudo crear el registro',
                    'showData' => 'true',
                ]
            ]
        ]);
    }

    public function actualizarRegistro($id){
        cm_model([
            'permitUpdate' => [
                'msg' => 'No tiene permiso para actualizar registros',
            ],
            'model' => 'updateRegistro',
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

    public function getRegistros(){
        cm_model([
            'permitRead' => [
                'msg' => 'No tiene permiso para ver registros',
            ],
            'model' => 'selectRegistros',
        ]);
    }

    public function getRegistrosById($id){
        cm_model([
            'permitRead' => [
                'msg' => 'No tiene permiso para ver registros',
            ],
            'model' => 'selectRegistrosById',
            'args' => [$id],
        ]);
    }

    public function eliminarRegistro($id){
        cm_model([
            'permitDelete' => [
                'msg' => 'No tiene permiso para eliminar registros',
            ],
            'model' => 'deleteRegistro',
            'args' => [$id],
            'return' => [
                'true' => [
                    'msg' => 'Registro eliminado',
                    'showData' => 'false',
                ],
                'false' => [
                    'msg' => 'No se pudo eliminar el registro',
                    'showData' => 'true',
                ]
            ]
        ]);
    }
}

?>