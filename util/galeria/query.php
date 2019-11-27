<?php 
    include("../system/funciones.php");

    try{

        if( Funciones::Session() ){
            $respuesta=Funciones::estadosRespuestas(2,"Acción no permitida.");
        }else{

            $sql = "SELECT * FROM sys_galerias WHERE ventana = 'Galeria' ";
            $query = Funciones::guardarData($sql,1);
            $cont = $query->num_rows;
            if( $cont > 0 ){
                $cont=0;
                foreach( $query as $fila ){
                    $photos[]=array(
                        'id'=>$fila['idGaleria'],
                        'actividad'=>ucfirst($fila['actividad']),
                        'fecha'=>date("d-m-Y", strtotime($fila['fecha_public']))
                    );
                }
                $respuesta = Funciones::estadosRespuestas(1,'',$photos);
            }else{
                $respuesta = Funciones::estadosRespuestas(2, "Lo sentimos no hay fotos para mostrarte.");
            }

        }

    }catch( Exception $e ){
        $respuesta = Funciones::estadosRespuestas(3,$e->getMessage());
    }
    print_r( json_encode( $respuesta ) );