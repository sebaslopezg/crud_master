<?php

class Facturacion extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    
    public function facturacion(){

        cm_page(array(
            'class' => $this,
            'page_title' => 'Mis facturas',
            'page_id' => 'facturacion',
            'view' => 'facturacion',
            'script' => 'facturacion',
        ));
    }

    public function getFacturas(){
        cm_get(array(
            'model' => selectFacturas(),
        ));
    }

    public function setFacturas(){

        $myForm = array(
            'table' => 'registros',
            'type' => 'post',
            'error_required_msg' => 'Error, debe ingresar todos los datos',
            'data' => array(
                'id' => array(
                    'type' => 'id',
                    'required' => true,
                ),
                'nombre' => array(
                    'type' => 'str',
                    'required' => true,
                ),
                'apellido' => array(
                    'type' => 'str',
                    'required' => true,
                ),
            ),
        );

        cm_set($myForm);
    }
}