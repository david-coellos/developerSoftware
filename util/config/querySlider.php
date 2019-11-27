<?php
include('../system/funciones.php');
try {

    if (Funciones::Session()) {

        $tipo = '';
        $files = '';
        $fecha = '';
        $activi = '';

        if (
            (isset($_POST['text']) && !empty($_POST['text'])) && 
            (isset($_POST['data']) && !empty($_POST['data'])) 
        ) {
            $tipo = strtolower(addslashes($_POST['text']));
            $fecha = addslashes($_POST['data']);
        }

        if( isset($_POST['acti']) ){
            $activi = ucfirst(str_replace(" ", "_", addslashes($_POST['acti'])));
        }

        if (isset($_FILES)  && !empty($_FILES)) {
            $files = $_FILES;
        }

        $q = "SELECT * FROM sys_galerias WHERE ventana = '$tipo'";
        $peticion = Funciones::guardarData($q);
        $cont = $peticion->num_rows;

        if ($cont > 0) {
            $queryUpdate = "UPDATE sys_galerias SET ventana = '$tipo', actividad='$activi', fecha_public = NOW() WHERE ventana = '$tipo'";
            $update = Funciones::guardarData($queryUpdate);
            if (!$update) {
                $respuesta = Funciones::estadosRespuestas(2, 'Error en la actualización.');
            }

            Funciones::borrarArchivos('../photos/' . ucfirst($tipo));

            Funciones::galerias($files, ucfirst($tipo), $fecha);


            $respuesta = Funciones::estadosRespuestas(1, 'Éxito en la actualización.');
        } else {
            $queryInsert = "INSERT INTO sys_galerias (ventana,actividad,fecha_public) VALUES ('$tipo','$activi',NOW())";
            $insert = Funciones::guardarData($queryInsert);
            if (!$insert) {
                $respuesta = Funciones::estadosRespuestas(2, 'Error al guardar.');
            }
            Funciones::galerias($files, ucfirst($tipo), $fecha);
            $respuesta = Funciones::estadosRespuestas(1, 'Éxito al guardar.');
        }
    } else {
        throw new Exception("Debe Iniciar Session.");
    }
} catch (Exception $e) {
    $respuesta = Funciones::estadosRespuestas(3, $e->getMessage());
}
print_r(json_encode($respuesta));
