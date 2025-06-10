<?php
//aqui van los hooks

$courrentClass;
Global $permit;
$permit = true;
function cm_page($array){

    $isPermit = true;
    $session = true;

    if (array_key_exists('login',$array)) {
        $session = false;
        if (empty($_SESSION['login'])) {
        }else{
            $session = true;
            if (array_key_exists('module',$array['login'])) {
                $idModuloActual = $array['login']['module'];
               getPermisos($idModuloActual);

               $arrPermit = setPermit($array, false);
               $isPermit = $arrPermit['permit'];
               global $permit;
               $permit = $isPermit;
            }
        }
    }

    if ($session && $isPermit) {
        $views = new Views();

        array_key_exists('page_title',$array) ? $data['page_title'] = $array['page_title'] : "Pagina sin nombre";
        array_key_exists('page_id',$array) ? $data['page_id'] = $array['page_id'] : 0;

        if (array_key_exists('script',$array)) {
            $data['script'] = $array['script'];
        }

        if (array_key_exists('data',$array)) {
            $data['data'] = $array['data'];
        }
        
        if (array_key_exists('view',$array) && array_key_exists('class',$array)) {
            $courrentClass = $array['class'];
            if (isset($data)) {
                $views->getView($courrentClass,$array['view'], $data);
            }else{
                //$views->getView($array['class'],$array['view']);
            }
        }
    }else{
        if ($session) {
            array_key_exists('permitRead',$array) && array_key_exists('relocate',$array['permitRead']) ? $route = $array['permitRead']['relocate'] : 'home';
            header('Location: ' . base_url()."/$route" );
        }else{
            array_key_exists('login',$array) && array_key_exists('relocate',$array['login']) ? $route = $array['login']['relocate'] : 'home';
            header('Location: ' . base_url()."/$route" );
        }
    }
}

// Sección controllers
function cm_get($array){

    if (array_key_exists('model',$array)){
        $arrData = $array['model'];
    }else{
        $arrData = array('status' => false, 'msg' => 'undefined model');
    }

    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
}

function cm_model($array){

    $permit = true;
    $arrPermit = setPermit($array);
    $permit = $arrPermit['permit'];
    $permitType = $arrPermit['permitType'];

    if ($permit) {
        if (array_key_exists('model',$array)){

            if (array_key_exists('args',$array)) {
                $model = call_user_func_array($array['model'], $array['args']);
            }else{
                $model = call_user_func($array['model']);
            }

    
            if(array_key_exists('return', $array)){
                if (array_key_exists('true', $array['return'])) {
                    $responseType = gettype($model);
    
                    if ($responseType == 'boolean') {
                        if ($model) {
                            $arrData = array('status' => true, 'msg' => $array['return']['true']['msg'], 'data' => $model);
                        }else{
                            $arrData = array('status' => false, 'msg' => $array['return']['false']['msg']);
                        }
                    }
    
                    if ($responseType == 'array') {
                        if (array_key_exists('status',$model)) {
                            if ($model['status']) {
                                if (array_key_exists('showData', $array['return']['true'])) {
                                    if ($array['return']['true']['showData'] == 'true') {
                                        $arrData = $model;
                                    }else{
                                        $arrData = array('status' => false, 'msg' => $array['return']['true']['msg']);
                                    }
                                }else{
                                    $arrData = array('status' => true, 'msg' => $array['return']['true']['msg']);
                                }
                            }else{
                                if (array_key_exists('showData', $array['return']['false'])) {
                                    if ($array['return']['false']['showData'] == 'true') {
                                        $arrData = $model;
                                    }else{
                                        $arrData = array('status' => false, 'msg' => $array['return']['false']['msg']);
                                    }
                                }else{
                                    $arrData = array('status' => false, 'msg' => $array['return']['false']['msg']);
                                }
                            }
                        }else{
                            $arrData = $model;
                        }
                    }
    
                    if ($responseType == 'integer') {
                        if ($model > 0) {
                            $arrData = array('status' => true, 'msg' => $array['return']['true']['msg'], 'data' => $model);
                        }else{
                            $arrData = array('status' => false, 'msg' => $array['return']['false']['msg']);
                        }
                    }
    
                    if ($responseType == 'string') {
                        try {
                            $res = intval($model);
                            if ($res == 0) {
                                if (array_key_exists('showData', $array['return']['true'])) {
                                    $array['return']['true']['showData'] == 'true' ? $data = $model : $data = '';
                                    $arrData = array('status' => true, 'msg' => $array['return']['true']['msg'], 'data' => $data);
                                }else{
                                    $arrData = array('status' => true, 'msg' => $array['return']['true']['msg']);
                                }
                            }
                        }catch(Exception $e){
                            $arrData = $model;
                        }
                    }
                }
            }else{
                $arrData = $model;
            }
        }else{
            $arrData = array('status' => false, 'msg' => 'undefined model');
        }
    }else{
        $permitMessage = null;
        $permitType == null ? $permitMessage = 'permission denied' : $permitMessage = $array[$permitType]['msg'];
        $arrData = array('status' => false, 'msg' => $permitMessage);
    }

    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
}

//TODO¬
//Resolver empty values en roles
function cm_set($array){

    if (array_key_exists('type',$array) && $array['type'] == 'post') {
        $data = $array['data'];
        $fields = array();
        $requiredFields = array();
        $requiredFieldsCount = 0;
        $requiredValueStatus = true;

        foreach ($data as $key => $value) {

            $fieldData = null;
            
            if (array_key_exists('value',$value)) {
                array_push($fields, $value['value']);
            }else{
                if (array_key_exists('hash',$value)) {
                    $fieldData = hash($value['hash'],strClean($_POST[$key]));
                }else{
                    isset($_POST[$key]) ? $fieldData = strClean($_POST[$key]) : $fieldData = null;
                }
            }

            if ($value['required'] === true) {
                $requiredFieldsCount++;
                if (check_post($key)) {
                    array_push($fields, $fieldData);
                    array_push($requiredFields, $fieldData);
                }
            }else{
                if (!array_key_exists('value',$value)) {
                    array_push($fields, $fieldData);
                }
            }

            if (array_key_exists('required_values',$value)) {
                $requiredValueStatus = false;
                foreach ($value['required_values'] as $requiredValue) {
                    if ($fieldData == $requiredValue) {
                        $requiredValueStatus = true;
                    }
                }
            }
        }

        if (count($requiredFields) != $requiredFieldsCount || $requiredValueStatus === false) {
            if (array_key_exists('error_required_msg',$array)) {
                $arrData = array('status' => false, 'msg' => $array['error_required_msg']);
            }else{
                $arrData = array('status' => false, 'msg' => 'Debe llenar todos los campos');
            }
        }else{
            if (array_key_exists('mysql_type',$array)) {
                $mysql = new Mysql();
                $exist = false;

                if (array_key_exists('prevent_exist',$array)) {
                    $prevent_data_fields = $array['prevent_exist']['data'];
                    $prevent_fields = array();
                    foreach ($prevent_data_fields as $key => $value) {
                        array_push($prevent_fields, strClean($_POST[$value]));
                    }
                    $query = $mysql->select_values($array['prevent_exist']['query'], $prevent_fields);
                    empty($query) ? $exist = false : $exist = true;
                }

                if (!$exist) {
                    if ($array['mysql_type'] == 'insert') {
                        $arrData = $mysql->insert($array['sql'], $fields);
                    }
                    if ($array['mysql_type'] == 'update') {
                        $arrData = $mysql->update($array['sql'], $fields);
                    }
                }else{
                    $arrData = array('status' => false, 'msg' => $array['prevent_exist']['error_exist_msg']);
                }
            }
        }
    }else{
        $arrData = array('status' => false, 'msg' => 'undefined');
    }
    return $arrData;
} 


//Seccion models

function cm_select($array){

    if (array_key_exists('all',$array) && array_key_exists('sql',$array)) {
        $mysql = new Mysql();
        if ($array['all'] == 'true') {
            $request = $mysql->select_all($array['sql']);
        }else{
            $request = $mysql->select($array['sql']);
        }
    }

    return $request;
}

//Actualizar registro
function cm_update($array){

    $request = null;

    if (array_key_exists('sql',$array) && array_key_exists('arrData',$array)) {
        $mysql = new Mysql();
        $request = $mysql->update($array['sql'], $array['arrData']);
    }

    return $request;
}

//eliminar registro
function cm_delete($array){

    $request = null;

    if (array_key_exists('sql',$array)) {
        $mysql = new Mysql();
        $request = $mysql->delete($array['sql']);
    }
    return $request;
}

//Setear modulos
function cm_setModule($params){
    if (array_key_exists('id',$params) && array_key_exists('name',$params)) {
        $mysql = new Mysql();
    }
}

//schema function 
function cm_schema_mysql($tableName,$params){
    
}