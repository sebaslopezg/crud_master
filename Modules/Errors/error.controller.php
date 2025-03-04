<?php

class Errors extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function notFound(){
        cm_page(array(
            'class' => $this,
            'view' => 'error',
        ));
    }
}

$notFound = new Errors();
$notFound->notFound();