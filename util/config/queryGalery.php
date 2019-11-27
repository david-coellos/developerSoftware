<?php 

include('../system/funciones.php');
try{

    if( Funciones::Session() ){
        $galeria = '';
        $ventana = "";
        $actividad = "";
        $fecha = "";

        if( isset($_FILES) && !empty($_FILES) ){
            $galeria = $_FILES;
        }

        if(
            ( isset($_POST['text']) && !empty($_POST['text']) ) && 
            ( isset($_POST['text_act']) && !empty($_POST['text_act']) ) &&
            ( isset($_POST['date']) && !empty($_POST['date']) )
        ){
            $ventana = strtolower( addslashes($_POST['text']) );
            $actividad = ucfirst( addslashes($_POST['text_act']) );
            $fecha = addslashes($_POST['date']);
        }

        if(
            empty($ventana) ||
            empty($actividad) ||
            empty($fecha)
        ){
            $respuesta = Funciones::estadosRespuestas(2,"Parámetros vacíos.");
        }

        $sql = "INSERT INTO sys_galerias (ventana,actividad,fecha_public) VALUES ('$ventana', '$actividad', NOW() )";
        $petecion = Funciones::guardarData($sql,1);

        if( !$petecion ){
            $respuesta = Funciones::estadosRespuestas(2,'Error al Guardar.');
        }
         
        Funciones::galerias($galeria,$actividad,$fecha);
        $respuesta = Funciones::estadosRespuestas(1,"Éxito");
    }else{
        $respuesta=Funciones::estadosRespuestas(2,"Debe Iniciar Session.");
    }

}catch(Exception $e){
    $respuesta=Funciones::estadosRespuestas(3,$e->getMessage());
}
print_r( json_encode($respuesta) );