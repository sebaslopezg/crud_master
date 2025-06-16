<?php

class Errors extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function notFound(){
        cm_page([
            'class' => $this,
            'page_title' => 'Error',
            'page_id' => 'error',
            'view' => 'errors',
        ]);
    }
}

$notFound = new Errors();
$notFound->notFound();