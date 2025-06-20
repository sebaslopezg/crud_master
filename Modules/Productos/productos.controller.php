<?php

class Productos extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function productos(){

        cm_page([
            'class' => $this,
            'login' => [
                'module' => 'productos',
                'relocate' => 'login',
            ],
            'permitRead' => [
                'relocate' => 'home',
            ],
            'page_title' => 'Productos',
            'page_id' => 'productos',
            'view' => 'productos',
            'script' => 'productos',
        ]);
    }

    public function crearProducto(){
        cm_model([
            'permitCreate' => [
                'msg' => 'No tiene permiso para crear productos',
            ],
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

    public function actualizarProducto($id){
        cm_model([
            'permitUpdate' => [
                'msg' => 'No tiene permiso para actualizar productos',
            ],
            'model' => 'actualizarProducto',
            'args' => [$id],
            'return' => [
                'true' => [
                    'msg' => 'Producto actualizado correctamente',
                    'showData' => 'false',
                ],
                'false' => [
                    'msg' => 'Error al actualizar el producto',
                    'showData' => 'true',
                ],
            ],
        ]);
    }

    public function listarProductos(){
        cm_model([
            'permitRead' => [
                'msg' => 'No tiene permiso para ver productos',
            ],
            'model' => 'listarProductos',
        ]);
    }

    public function listarProductoId($id){
        cm_model([
            'permitRead' => [
                'msg' => 'No tiene permiso para ver productos',
            ],
            'model' => 'listarProductoId',
            'args' => [$id],
        ]);
    }

    public function listarProductoCodigo($codigo){
        cm_model([
            'permitRead' => [
                'msg' => 'No tiene permiso para ver productos',
            ],
            'model' => 'listarProductoCodigo',
            'args' => [$codigo],
        ]);
    }

    public function eliminarProducto($id){
        cm_model([
            'permitDelete' => [
                'msg' => 'No tiene permiso para eliminar productos',
            ],
            'model' => 'eliminarProducto',
            'args' => [$id],
            'return' => [
                'true' => [
                    'msg' => 'Producto eliminado correctamente',
                    'showData' => 'false',
                ],
                'false' => [
                    'msg' => 'Error al eliminar el producto',
                    'showData' => 'true',
                ],
            ],
        ]);
    }
}