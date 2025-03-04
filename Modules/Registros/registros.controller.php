<?php

class Registros extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function registros(){

        cm_page(array(
            'class' => $this,
            'page_title' => 'Los registros',
            'page_id' => 'registros',
            'view' => 'registros',
            'script' => 'registros',
        ));
    }

    public function crearRegistro(){
        cm_model(array(
            'model' => insertRegistro(),
            'return' => array(
                'true' => array(
                    'msg' => 'Registro creado',
                    'showData' => 'true',
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
            'model' => selectRegistros(),
        ));
    }

    public function getRegistrosById($id){
        cm_model(array(
            'model' => selectRegistrosById($id),
        ));
    }

    public function eliminarRegistro($id){
        cm_model(array(
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