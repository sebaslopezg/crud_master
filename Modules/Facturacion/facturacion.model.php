<?php

function selectFacturas(){
    $selectFacturas = mc_select(array(
        'all' => 'true',
        'sql' => 'SELECT * FROM registros'
    )); 
    return $selectFacturas;
}