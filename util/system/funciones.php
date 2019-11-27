<?php
if (!class_exists('DBManager') || !class_exists('Session') )  {
    include('conPostGres.php');
    include('session.php');
}
class Funciones
{
    public static function guardarData($sql, $ub=2)
    {
        $conexion = new DBManager();
        $conexion->DBConexion();
        $query = $conexion->DBConsulta($sql, $ub);
        return $query;
    }

    public static function galerias($filesImg, $name_folder, $fecha = null)
    {
        if ($fecha == null) {
            $fecha = date("Ymd");
        }
        if (is_array($filesImg)) {
            $files = '../photos/';
            if (!file_exists($name_folder)) {
                mkdir($files . $name_folder, 0777, true);
            }
            $openDir = $files . $name_folder;
            $dir = opendir($openDir);
            $fileLength = count($filesImg);
            $cont = 00001;
            for ($f = 0; $f < $fileLength; $f++) {
                $file_extension = explode(".", $filesImg[$f]['name']);
                $extension = array('jpg', "jpeg", "png", "JPG");
                if (in_array(strtolower($file_extension[1]), $extension)) {
                    $new_name = ('IMG_' . $fecha . '_' . $cont . '.' . $file_extension[1]);
                    $origen = $filesImg[$f]['tmp_name'];
                    $destino = $openDir . '/' . $new_name;
                    move_uploaded_file($origen, $destino);
                }

                $cont++;
            }
            closedir($dir);
        }
    }

    public static function escribirLogs($ubi, $nombre, $description)
    {
        $destination = '';
        if ($ubi == 1) {
            $destination = '../logs/';
        } else {
            $destination = 'util/logs/';
        }
        $carpeta = $destination . date('Y') . '/' . date("m") . '/' . date("d") . '/';
        if (!file_exists($destination . date('Y') . '/' . date("m") . '/' . date("d") . '/')) {
            mkdir($destination . date('Y') . '/' . date("m") . '/' . date("d") . '/', 0777, true);
        }

        $archivo = fopen($carpeta . $nombre . '.txt', "a") or die("Archivo Inaccesible!");
        fwrite($archivo, date("Y-m-d H:i:s") . ' >>>> ' . $description . "\r\n");
        fclose($archivo);
    }

    public static function conexion($url)
    {
        $rsp = array();
        $cab = get_headers($url);

        if ((int) substr($cab[0], 9, 3) == 200 || (int) substr($cab[0], 9, 3) == 300 || (int) substr($cab[0], 9, 3) == 301) {
            $rsp[0] = 0;
            $rsp[1] = $url;
        } else {
            $rsp[0] = 1;
            $rsp[1] = $url;
        }
        return $rsp;
    }

    public static function retornaCss($url, $ruta = 'css/bootstrap-4.3.1-dist/css')
    {

        if ($url[0] == 0) {
            return '<link type="text/css" rel="stylesheet" href="' . $url[1] . '" />';
        } else {
            $punto = explode("/", $url[1]);
            $lib = end($punto);
            return '<link type="text/css" rel="stylesheet" href="lib/' . $ruta . '/' . $lib . '" />';
        }
    }

    public static function retornaJS($url, $ruta = 'css/bootstrap-4.3.1-dist/js')
    {
        if ($url[0] == 0) {
            return '<script type="text/javascript" language="javascript" src="' . $url[1] . '" ></script>';
        } else {
            $punto = explode("/", $url[1]);
            $lib = end($punto);
            return '<script type="text/javascript" language="javascript" src="lib/' . $ruta . '/' . $lib . '" ></script>';
        }
    }

    public static function estadosRespuestas($estado = 3, $mensaje = null, $data = null)
    {
        $respuesta = new stdClass();
        $respuesta->estado = $estado;
        $respuesta->mensaje = $mensaje;
        $respuesta->data = $data;
        return $respuesta;
    }

    public static function Session()
    {
        $session = new Session();
        $flag = false;
        if ($session->checkSession()) {
            $flag = true;
        }
        return $flag;
    }

    public static function crearSession($data){
        $sesion = new Session();
        $sesion->createSession($data);
        //print_r($data);
    }

    public static function findSession()
    {
        $session = new Session();
        $session->endSession();
    }

    public static function borrarArchivos($ruta)
    {
        foreach (glob($ruta . '/*') as $filesArch) {
            if (!is_dir($filesArch)) {
                unlink($filesArch);
            }
        }
        rmdir($ruta);
    }

    public static function abrir_carpeta($carpeta)
    {
        $ubi = '../photos/' . $carpeta;
        $flag = array();
        if (is_dir($ubi)) {
            if ($folder = opendir($ubi . '/')) {
                while ($f = readdir($folder)) {
                    if (!is_dir($f)) {
                        $flag[] = 'photos/' . $carpeta . '/' . $f;
                    }
                }
            }
        }
        return $flag;
    }
}
