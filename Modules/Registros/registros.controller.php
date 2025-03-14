<?php

class Registros extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function registros(){

        cm_page(array(
            'class' => $this,
            'login' => array(
                'module' => 'registros',
                'relocate' => 'login',
            ),
            'permitRead' => array(
                'relocate' => 'home',
            ),
            'page_title' => 'Los registros',
            'page_id' => 'registros',
            'view' => 'registros',
            'script' => 'registros',
        ));
    }

    public function crearRegistro(){
        cm_model(array(
            'permitCreate' => array(
                'msg' => 'No tiene permiso para crear registros',
            ),
            'model' => insertRegistro(),
            'return' => array(
                'true' => array(
                    'msg' => 'Registro creado',
                    'showData' => 'false',
                ),
                'false' => array(
                    'msg' => 'No se pudo crear el registro',
                    'showData' => 'true',
                )
            )
        ));
    }

    public function actualizarRegistro($id){
        cm_model(array(
            'permitUpdate' => array(
                'msg' => 'No tiene permiso para actualizar registros',
            ),
            'model' => updateRegistro($id),
            'return' => array(
                'true' => array(
                    'msg' => 'Registro actualizado',
                    'showData' => 'true',
                ),
                'false' => array(
                    'msg' => 'No se pudo actualizar el registro',
                    'showData' => 'true',
                )
            )
        ));
    }

    public function getRegistros(){
        cm_model(array(
            'permitRead' => array(
                'msg' => 'No tiene permiso para ver registros',
            ),
            'model' => selectRegistros(),
        ));
    }

    public function getRegistrosById($id){
        cm_model(array(
            'permitRead' => array(
                'msg' => 'No tiene permiso para ver registros',
            ),
            'model' => selectRegistrosById($id),
        ));
    }

    public function eliminarRegistro($id){
        cm_model(array(
            'permitDelete' => array(
                'msg' => 'No tiene permiso para eliminar registros',
            ),
            'model' => deleteRegistro($id),
            'return' => array(
                'true' => array(
                    'msg' => 'Registro eliminado',
                ),
                'false' => array(
                    'msg' => 'No se pudo eliminar el registro',
                )
            )
        ));
    }
}

?>