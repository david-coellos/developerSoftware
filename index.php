<?php
error_reporting(0);
include("util/system/funciones.php");
try {

    $valor = array();
    $parametros = Funciones::guardarData("SELECT * FROM sys_parametros");
    foreach ($parametros as $fila) {
        $valor[trim($fila['nombre'])] = trim($fila['valor']);
    }

    $webVersion = $valor['web'];

    if (Funciones::Session()) {

        include("inc/config/cuerpo.php");
    } else {
        if (isset($_SESSION['fechaSession'])) {
            $fechaGuardada = $_SESSION['fechaSession'];
            $ahora = date("Y-m-d H:i:s");

            $trans = (strtotime($ahora) - strtotime($fechaGuardada));

            if ($trans >= ($valor['timeout'] * 60)) {
                Funciones::findSession();
                header("Refresh:0");
                exit();
            } else {
                $_SESSION['fechaSession'] = date("Y-m-d H:i:s");
            }
        } else {
            $_SESSION['fechaSession'] = date("Y-m-d H:i:s");
        }

        $pagina = $valor['paginadefault'];
        if (isset($_GET['pagina']) && !empty($_GET['pagina'])) {
            $pagina = $_GET['pagina'];
        }

        #extracion de menu desde la base de datos
        $menu = Funciones::guardarData("SELECT * FROM sys_menu ORDER BY orden");
        $varMenu = array();
        $cont = 0;
        foreach ($menu as $fila) {
            $varMenu[$cont]['idpadre'] = $fila['idpadre'];
            $varMenu[$cont]['idmn'] = $fila['idmn'];
            $varMenu[$cont]['nombre'] = $fila['nombre'];
            $varMenu[$cont]['ventana'] = $fila['ventana'];
            $varMenu[$cont]['estado'] = $fila['estado'];
            $varMenu[$cont]['es_menu'] = $fila['es_menu'];
            $cont++;
        }

        #estraccion de nombre de ventana para las penstañas
        $pestana = Funciones::guardarData('
        SELECT nombre, librerias
        FROM sys_menu
        WHERE ventana = "' . $pagina . '"
    ');
        $varAcces = array();
        foreach ($pestana as $fila) {
            $varAcces['nombre'] = $fila['nombre'];
            $varAcces['librerias'] = explode(",", $fila['librerias']);
        }

        include("inc/cabpie/cab.php");
        include("inc/" . $pagina . "/cuerpo.php");
        include("inc/cabpie/pie.php");
    }
} catch (Exception $e) {
    Funciones::escribirLogs(2, "Error de Carga", $e->getMessage());
}
