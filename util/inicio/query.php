<?php
    include('../system/funciones.php');
    try{
        if(!Funciones::Session()){
            $query = "SELECT * FROM sys_galerias WHERE ventana = 'inicio' ";
            $sql = Funciones::guardarData($query);
            $cont = $sql->num_rows;
            if( $cont > 0 ){
                $folder;
                foreach( $sql as $fila ){
                    $folder = $fila['ventana'];
                }
                $visualizar_archivos = Funciones::abrir_carpeta(ucfirst($folder));
                $respuesta=Funciones::estadosRespuestas(1,'',$visualizar_archivos);
            }else{
                $respuesta=Funciones::estadosRespuestas(2,'Lo siento no hay fotos/imagenes para mostrarte.');
            }
        }
    }catch(Exception $e){
        $respuesta=Funciones::estadosRespuestas(3,$e->getMessage());
    }
    print_r( json_encode( $respuesta ) );