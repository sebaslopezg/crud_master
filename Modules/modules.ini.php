<?php

$GLOBALS['navbar'] = array(
    array(
        'title' => 'Dashboard',
        'icon' => 'grid',
        'url' => 'dashboard',
        'page_id' => 'dashboard',
    ),
    array(
        'title' => 'Usuarios',
        'icon' => 'people',
        'url' => 'usuarios',
        'page_id' => 'usuarios',
    ),
    array(
        'title' => 'Roles',
        'icon' => 'file-person',
        'url' => 'roles',
        'page_id' => 'roles',
    ),
    array(
        'permit' => true,
        'title' => 'Productos',
        'icon' => 'box-seam',
        'url' => 'productos',
        'page_id' => 'productos',
    ),
    array(
        'title' => 'Registros',
        'icon' => 'journal-text',
        'url' => 'registros',
        'page_id' => 'registros',
    ),
    array(
        'permit' => true,
        'title' => 'Salir',
        'icon' => 'box-arrow-right',
        'url' => 'logout',
        'page_id' => 'logout',
    ),
);