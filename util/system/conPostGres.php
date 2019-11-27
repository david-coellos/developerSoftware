<?php
    class DBManager{
        private $conexion;
        private $servidor;
        private $usuario;
        private $clave;
        private $bd;

        public function __construct(){
            $this->servidor = 'localhost';
            $this->usuario = 'root';
            $this->clave = '';
            $this->bd = 'sanpio';
        }

        public function DBConexion(){
            $mysql = new mysqli($this->servidor, $this->usuario, $this->clave, $this->bd);
            if( $mysql->connect_error ){
                Funciones::escribirLogs(1,'DBConexion','Error de conexion. Problema '.$mysql->connect_error);
                die('error de conexion. Problema '.$mysql->connect_error);
                $this->conexion = false;
                return false;
            }else{
                $this->conexion = $mysql;
                $this->conexion->set_charset('utf8');
                return true;
            }
        }

        public function DBConsulta($sql,$ubi){
            $peticion = $this->conexion->query($sql);
            if( $peticion ){
                return $peticion;
            }else{
                Funciones::escribirLogs($ubi,'DBConsulta','Error de consulta. Problema ('.$this->conexion->error.') '.$sql);
                die('Error de consulta. Problema ('.$this->conexion->error.') '.$sql);
                return false;
            }
        }

        public function __destruct(){
            if( $this->conexion ){
                $this->conexion->close();
            }
        }
    
    }
?>