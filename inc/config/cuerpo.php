<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Configuración | <?php echo $valor['unidadEduc']; ?></title>
    <?php
    $bootstrap = Funciones::conexion('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css');
    echo (Funciones::retornaCss($bootstrap) . "\r\n");

    $font = Funciones::conexion('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    echo (Funciones::retornaCss($font, 'css/font') . "\r\n");

    $dateRangePickerCss = Funciones::conexion("https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css");
    echo Funciones::retornaCss($dateRangePickerCss, "css/datepicker/") . "\r\n";
    ?>
    <link rel="stylesheet" type="text/css" href="css/<?php echo $valor['sitioWeb']; ?>/style.css?v=<?php echo $webVersion; ?>">

</head>

<body>
    <input type="hidden" name="tiempo" id="tiempo" value="<?php echo $valor['timeout']; ?>">
    <div class="container">
        <div class="alert alert-info alert-sm" role="alert">
            <div class="row">
                <div class="col-md-11">
                    <h4 class="alert-heading">Bienvenido !</h4>
                    <p>
                        Recuerde que al subir las imáganes de portada y las galerias de la fotos tienen que tener una extencion de jpeg, JPG, png.
                    </p>
                    <p>
                        No hay limite para subir imáganes y/o fotos
                    </p>
                </div>
                <div class="col-md-1">
                    <a href="util/system/lagout.php" class="btn col" id="cerrarSession"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="accordion" id="accordion1">
                    <div class="card">
                        <div class="card-header" id="heading1">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#slider" aria-expanded="true" aria-controls="slider">
                                    Slider Principal
                                </button>
                            </h2>
                        </div>
                        <div id="slider" class="collapse show" aria-labelledby="heading1" data-parent="#accordion1">
                            <div class="card-body">
                                <form id="formSlider" enctype="multipart/form-data" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <input type="text" id="txt_name" name="txt_name" disabled class="form-control  " value="Inicio" />
                                        </div>
                                        <div class="form-group col">
                                            <div class="custom-file ">
                                                <input type="file" id="slider" name="slider[]" multiple class="custom-file-input custom-file-input-sm" lang="es" />
                                                <label for="slider" class="custom-file-label" data-browse="Buscar"><i class="fa fa-picture-o mr-2" aria-hidden="true"></i> Seleccionar archivo/os</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button class="btn border border-success text-success col" id="formSubmit" type="submit" disabled >Guardar</button>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <textarea name="activ" id="activ" class="form-control" placeholder="Ingrese nombre de la actividad"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="vista-pre">

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!--
                <div class="accordion" id="accordion1">
                    <div class="card">
                        <div class="card-header" id="heading1">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#slider" aria-expanded="true" aria-controls="slider">
                                    Calendario de eventos
                                </button>

                                <button type="button" class="btn float-right plus-element" data-toggle="tooltip" data-placement="left" title="Pulse aqui para agregar más entrada de datos para el calendario"> 
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="slider" class="collapse show" aria-labelledby="heading1" data-parent="#accordion1">
                            <div class="card-body">
                                <form id="formEventosr">

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="dateEvent" class="sr-only">Seleccione la fecha del evento</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend btns" style="cursor:pointer">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="dateRange" id="dateRange" class="form-control" value="<?php echo date("d/m/Y"); ?>" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group col">
                                            <textarea name="activ" id="activ" class="form-control" placeholder="Ingrese nombre de la actividad"></textarea>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                -->
                <div class="accordion" id="accordion2">
                    <div class="card">
                        <div class="card-header" id="heading2">
                            <h2 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#galeria" aria-expanded="true" aria-controls="galeria">
                                    Galeria de eventos
                                </button>
                            </h2>
                        </div>
                        <div id="galeria" class="collapse show" aria-labelledby="heading2" data-parent="#accordion2">
                            <div class="card-body">
                                <form id="formGalery" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="ventana" class="sr-only">Selecione las fotos para las galerias</label>
                                            <input type="text" name="text_galeria" id="text_galeria" class="form-control" value="Galeria" disabled>
                                        </div>
                                        <div class="form-group col-md">
                                            <div class="custom-file">
                                                <input type="file" id="galeria" name="galeria[]" multiple class="custom-file-input custom-file-input-sm" lang="es" />
                                                <label for="galeria" class="custom-file-label" data-browse="Buscar"><i class="fa fa-picture-o mr-2" aria-hidden="true"></i> Seleccionar archivo/os</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                        <button class="btn border border-success text-success col-md" id="formSubmitGaleria" type="submit" disabled >Guardar</button>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <input type="text" name="text_act" id="text_act" class="form-control" placeholder="Nombre de la actividad que se realizo" required
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="vist-previu">

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php
    $jquery = Funciones::conexion('https://code.jquery.com/jquery-3.4.1.min.js');
    echo (Funciones::retornaJS($jquery, 'js/jquery') . "\r\n");

    $popper = Funciones::conexion('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
    echo (Funciones::retornaJS($popper, 'js/popper') . "\r\n");

    $bootstrap = Funciones::conexion('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js');
    echo (Funciones::retornaJS($bootstrap) . "\r\n");

    $moment = Funciones::conexion("https://cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js");
    echo Funciones::retornaJS($moment, 'js/moment/') . "\r\n";

    $dateRangePickerJs = Funciones::conexion("https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js");
    echo Funciones::retornaJS($dateRangePickerJs, 'js/datepicker/') . "\r\n";
    ?>
    <script type="text/javascript" language="javascript" src="js/<?php echo $valor['sitioWeb']; ?>/funciones.js?v=<?php echo $webVersion; ?>"></script>
</body>

</html>