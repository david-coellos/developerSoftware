<?php 

    include('funciones.php');

    if( Funciones::Session() ){
        Funciones::findSession();
        header('Location:../../');
    }