<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $varAcces['nombre']; ?> | <?php echo $valor['unidadEduc']; ?></title>

    <?php
    $bootstrap = Funciones::conexion('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css');
    echo (Funciones::retornaCss($bootstrap));

    $font = Funciones::conexion('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    echo (Funciones::retornaCss($font, 'css/font'));

    for ($a = 0; $a < count($varAcces['librerias']); $a++) {
        switch ($varAcces['librerias'][$a]) {
            case 'fullcalendar':
                $fullcalendar = Funciones::conexion('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css');
                echo (Funciones::retornaCss($fullcalendar));
                break;
        }
    }
    ?>
        <link rel="stylesheet" type="text/css" href="css/cabpie/style.css?v=<?php echo $webVersion; ?>">
        <link rel="stylesheet" type="text/css" href="css/<?php echo $pagina ?>/style.css?v=<?php echo $webVersion; ?>">
</head>

<body>
    
    <div class="modal fade" id="formLogin" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalLongTitle">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cuenta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formLoginAccess">
                    <div class="modal-body">

                    <label for="usuario" class="sr-only">Usuario </label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="username" placeholder="Ingrese Usuario" onkeyup ="analizaCorre(this);">
                    </div>

                    <label for="usuario" class="sr-only">Contraseña </label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></i></div>
                        </div>
                        <input type="password" class="form-control form-control-sm" id="userpass" placeholder="Ingrese Contraseña" onkeyup="analizaPass(this)">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm" >Acceder</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row so">
            <div class="col-md-2 social">
                <span>Siguenos</span>
                <a href="#" target="_blank"></a>
                <a href="#" target="_blank"></a>
            </div>
            <div class="col-md lugar">
                <div class="row">
                    <div class="col">
                        <span></span>
                        <span>Guasmo Sur Coop. Mariuxi Febres Cordero</span>
                    </div>
                    <div class="col">
                        <span></span>
                        <span>2-5766721</span>
                    </div>
                    <div class="col">
                        <span></span>
                        <span>esc_sanpio1318@hotmail.com</span>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navba navbar navbar-expand-md sticky-top navbar-light" style="background-color: #e3f2fd;">
            <a href="inicio" class="navbar-brand">
                <img src="img/cabpie/cab/1.jpg" alt="" width="30">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="text-center collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">

                    <?php
                    $menu = '';
                    for ($f = 0; $f < count($varMenu); $f++) {
                        if ($varMenu[$f]['es_menu'] == 'SI') {

                            $menuInt = '<div class="dropdown-menu navbarDropdown" aria-labelledby="navbarDropdown' . ($f + 1) . '" id="navbarDropdown' . ($f + 1) . '">';

                            for ($i = 0; $i < count($varMenu); $i++) {

                                if (
                                    $varMenu[$i]['es_menu'] == 'NO' &&
                                    $varMenu[$i]['idpadre'] == $varMenu[$f]['idmn']
                                ) {
                                    $menuInt .= '
                                    <a class="dropdown-item" href="' . $varMenu[$i]['ventana'] . '">' . $varMenu[$i]['nombre'] . '</a>';
                                }
                            }
                            $menuInt .= '</div>';

                            if ($f == 0) {
                                $menu .= '<li class="nav-item active">
                            <a class="nav-link" href="' . $varMenu[$f]['ventana'] . '">' . $varMenu[$f]['nombre'] . '</a>
                        </li>';
                            } else {

                                if ($varMenu[$f]['ventana'] == NULL) {

                                    $menu .= '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown' . ($f + 1) . '" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $varMenu[$f]['nombre'] . '
                            </a>' . $menuInt . '
                        </li>';
                                } else {
                                    $menu .= '<li class="nav-item ">
                            <a class="nav-link" href="' . $varMenu[$f]['ventana'] . '">' . $varMenu[$f]['nombre'] . '</a>
                        </li>';
                                }
                            }
                        }
                    }
                    echo $menu;
                    ?>
                </ul>
                <ul class="navbar-nav">
                    <li>
                        <button type="button" class="btn" data-toggle="modal" data-target="#formLogin"><i class="fa fa-cog fa-spin" aria-hidden="true"></i></button>
                    </li>
                </ul>
            </div>
        </nav>