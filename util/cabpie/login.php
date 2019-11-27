<?php
    include("../system/conPostGres.php");
    include("../system/session.php");
    include("../system/funciones.php");

    $session = new Session();

    try{
        if( $session->checkSession() ){
            throw new Exception('Debe Iniciar Session.');
        }else{
            $key = 1997;
            $username='';
            $userpass='';
            if(
                ( isset($_POST['usu']) && !empty($_POST['usu']) ) &&
                ( isset($_POST['pass']) && !empty($_POST['pass']) )
            ){
                $username=addslashes($_POST['usu']);
                $userpass=addslashes($_POST['pass']);
            }
            if(
                empty($username) ||
                empty($userpass)
            ){
                throw new Exception('Parámetros Vacíos.');
            }

            $sql = "SELECT * FROM sys_usuario WHERE usuario='" . $username . "' AND contrasena = ( aes_encrypt('" . $userpass . "', '" . $key . "')  )";
            
            $query = Funciones::guardarData($sql);

            $total = $query->num_rows;

            if( $total > 0 ){
                $vecSession = array();
                foreach($query as $fila){
                    $vecSession = $fila;
                }
                $session->createSession($vecSession);
                $respuesta=Funciones::estadosRespuestas(1,'Éxito');
            }else{
                throw new Exception("Usuario y/o contraseña incorrectas");
            }
        }
    }catch(Exception $e){
        $respuesta = Funciones::estadosRespuestas(2,$e->getMessage());
    }

    print_r(json_encode($respuesta));