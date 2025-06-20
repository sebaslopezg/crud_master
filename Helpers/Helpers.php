<?php

function base_url(){
    return BASE_URL;
}

function media(){
    return BASE_URL."/Assets";
}

function header_admin($data = ""){
    $view_header = "Template/header_admin.php";
    require_once ($view_header);
}

function header_landing(){
    $view_landingHeader = "Template/Landing/header_landing.php";
    require_once ($view_landingHeader);
}

function footer_admin($data = ""){
    $view_footer = "Template/footer_admin.php";
    require_once ($view_footer);
}

function footer_landing(){
    $view_landingFooter = "Template/Landing/footer_landing.php";
    require_once ($view_landingFooter);
}

function dep($data){
    $format = print_r('<pre>');
    $format .= print_r($data);
    $format .= print_r('<pre>');
    return $format;
}

function console_log($data){
?>
<script>
    console.log(`<?php print_r($data); ?>`)
</script>
<?php
}

function setPermit($array){
    $permit = true;
    $setPermit = false;
    $permitType = null;
    $crudType = null;

    if (isset($_SESSION)) {
        if (isset($_SESSION['permisosMod'])) {
            if (array_key_exists('permisosMod',$_SESSION)) {


                if (array_key_exists('permitRead',$array)) {
                    $permitType = 'permitRead';
                    $crudType = 'r';
                    $setPermit = true;
                }
                if (array_key_exists('permitCreate',$array)) {
                    $permitType = 'permitCreate';
                    $crudType = 'w';
                    $setPermit = true;
                }
                if (array_key_exists('permitUpdate',$array)) {
                    $permitType = 'permitUpdate';
                    $crudType = 'u';
                    $setPermit = true;
                }
                if (array_key_exists('permitDelete',$array)) {
                    $permitType = 'permitDelete';
                    $crudType = 'd';
                    $setPermit = true;
                }
            
                if ($permitType != null) {
                    if ($setPermit) {
                        $permit = false;
                        if (!empty($_SESSION['permisosMod'])) {
                            if ($_SESSION['permisosMod'][$crudType] == 1) {
                                $permit = true;
                            }
                        }
                    }
                }
            }
        }
    }

    $arrResponse = array('permit' => $permit, 'permitType' => $permitType);
    $_SESSION['permit'] = $permit;

    return $arrResponse;
}

function getModal(string $nameModal, $data){
    $view_modal = "Template/Modals/{$nameModal}.php";
    require_once $view_modal;
}

//Revisar esta funcion

function getUser(string $userDataKey = null){
    $response = null;

    if (isset($_SESSION)) {
        if (array_key_exists('userData',$_SESSION)) {
            if ($userDataKey !== null) {
                $response = $_SESSION['userData'][$userDataKey];
            }else{
                $response = $_SESSION['userData'];
            }
        }
    }

    return $response;
}

function getPermisos($idmodulo){
    require_once("Modules/Permisos/permisos.model.php");
    $idRol = $_SESSION['userData']['rol_id'];
    $arrPermisos = permisosModulo($idRol);

    $permisos = '';
    $permisosMod = '';
    $permisosModIsSet = false;

    if (count($arrPermisos) > 0) {
        $permisos = $arrPermisos;
        foreach ($arrPermisos as $permiso) {
            if ($permiso['modulo_id'] == $idmodulo) {
                $permisosMod = $permiso;
                $permisosModIsSet = true;
            }
        }
        if (!$permisosModIsSet) {
            $permisosMod = '';
        }
    }
    $_SESSION['permisos'] = $permisos;
    $_SESSION['permisosMod'] = $permisosMod;
}

function getScriptSession(){
    $scriptSession = json_encode($_SESSION, JSON_UNESCAPED_UNICODE);
    ?>
        <script>
            const scriptSession = <?= $scriptSession ?>
        </script>
    <?php
}

function strClean($strCadena){
    $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
    $string = trim($string); //Elimina espacios en blanco al inicio y al final
    $string = stripslashes($string); // Elimina las \ invertidas
    $string = str_ireplace("<script>","",$string);
    $string = str_ireplace("</script>","",$string);
    $string = str_ireplace("<script src>","",$string);
    $string = str_ireplace("<script type=>","",$string);
    $string = str_ireplace("SELECT * FROM","",$string);
    $string = str_ireplace("DELETE FROM","",$string);
    $string = str_ireplace("INSERT INTO","",$string);
    $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
    $string = str_ireplace("DROP TABLE","",$string);
    $string = str_ireplace("OR '1'='1","",$string);
    $string = str_ireplace('OR "1"="1"',"",$string);
    $string = str_ireplace('OR `1`=`1`',"",$string);
    $string = str_ireplace("is NULL; --","",$string);
    $string = str_ireplace("in NULL; --","",$string);
    $string = str_ireplace("LIKE '","",$string);
    $string = str_ireplace('LIKE "',"",$string);
    $string = str_ireplace('LIKE `',"",$string);
    $string = str_ireplace("OR 'a'='a","",$string);
    $string = str_ireplace('OR "a"="a',"",$string);
    $string = str_ireplace("OR `a`=`a","",$string);
    $string = str_ireplace("OR `a`=`a","",$string);
    $string = str_ireplace("--","",$string);
    $string = str_ireplace("^","",$string);
    $string = str_ireplace("[","",$string);
    $string = str_ireplace("]","",$string);
    $string = str_ireplace("==","",$string);
    $string = filter_var($string, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return $string;
}

function arrClean($array){
    $arrResponse = array();
    foreach ($array as $key => $value) {
        //array_push($arrResponse,strClean($value));
        $arrResponse[$key] = strClean($value);
    }

    return $arrResponse;
}

function check_post($value){
    $validState = true;
    if (!isset($_POST[$value]) || empty(strClean($_POST[$value]))) {
        $validState = false;
    }
    return $validState;
}

function check_file(array $fileName){
    $validState = true;
    foreach($fileName as $value){
        if ($_FILES[$value]['error'] == 4 || ($_FILES[$value]['size'] == 0 && $_FILES[$value]['error'] == 0)) {
            $validState = false;
        }
    }
    return $validState;
}

function save_image($fileName){
    $imagen = $_FILES[$fileName];
    $response = "";
    $directorio = 'Assets/img/upload/';
    if (!is_dir($directorio)) {
        mkdir($directorio, 0777, true);
    }
    $extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);
    $nuevoNombreImagen = pathinfo($imagen['name'], PATHINFO_FILENAME) . '_' . date("Ymd_His") . '.' . $extension;
    $rutaArchivo = $directorio . $nuevoNombreImagen;
    if(move_uploaded_file($imagen['tmp_name'], $rutaArchivo)) {
        $response = $rutaArchivo;
    }

    return $response;
}