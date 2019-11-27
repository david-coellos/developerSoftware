<?php 
    include("../system/funciones.php");

    try{

        if( Funciones::Session() ){
            $respuesta=Funciones::estadosRespuestas(2,"Acción no permitida.");;
        }

        $album = '';
        if(
            isset($_POST['name']) && !empty($_POST['name'])
        ){
            $album = ucfirst( addslashes( $_POST['name'] ) );
        }

        $respuesta=Funciones::estadosRespuestas(1,'',Funciones::abrir_carpeta($album));

    }catch( Exception $e ){
        $respuesta = Funciones::estadosRespuestas(3,$e->getMessage());
    }
    print_r( json_encode( $respuesta ) );