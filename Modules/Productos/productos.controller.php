<?php

class Productos extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function productos(){

        cm_page(array(
            'class' => $this,
            'page_title' => 'Mis inventarios xD',
            'page_id' => 'productos',
            'view' => 'productos',
            'script' => 'productos',
        ));
    }

    public function crearProducto(){
        cm_model([
            'model' => 'crearProducto',
            'return' => [
                'true' => [
                    'msg' => 'Producto guardado correctamente',
                    'showData' => 'false',
                ],
                'false' => [
                    'msg' => 'Error al guardar el producto',
                    'showData' => 'true',
                ],
            ],
        ]);
    }

    public function listarProductos(){
        cm_model([
            'model' => 'listarProductos',
        ]);
    }

    public function listarProductoId($id){
        cm_model([
            'model' => 'listarProductoId',
            'args' => [$id],
        ]);
    }
}