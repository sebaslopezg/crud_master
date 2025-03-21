<?php

class Clientes extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function clientes(){
        cm_page([
            'class' => $this,
            'page_title' => 'Clientes',
            'page_id' => 'clientes',
            'view' => 'clientes',
            'script' => 'clientes',
        ]);
    }

    public function crearCliente(){
        cm_model([
            'model' => 'crearCliente',
            'return' => [
                'true' => [
                    'showData' => 'false',
                    'msg' => 'Cliente Insertado de manera exitosa',
                ],
                'false' => [
                    'ShowData' => 'true',
                ],
            ],
        ]);
    }

    public function listarClientes(){
        cm_model([
            'model' => 'listarClientes',
        ]);
    }

    public function listarClienteId($id){
        cm_model([
            'model' => 'listarClienteId',
            'args' => [$id],
        ]);
    }

    public function actualizarCliente($id){
        cm_model([
            'model' => 'actualizarCliente',
            'args' => [$id],
            'return' => [
                'true' => [
                    'msg' => 'Cliente Insertado de manera exitosa',
                    'showData' => 'false',
                ],
                'false' => [
                    'msg' => 'Error',
                    'ShowData' => 'true',
                ],
            ],
        ]);
    }

    public function eliminarCliente($id){
        cm_model([
            'model' => 'eliminarCliente',
            'args' => [$id],
            'return' => [
                'true' => [
                    'showData' => 'false',
                    'msg' => 'Cliente eliminado de manera exitosa',
                ],
                'false' => [
                    'ShowData' => 'true',
                ],
            ],
        ]);
    }
}