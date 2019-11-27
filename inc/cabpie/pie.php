            <footer class="footer">
                <h2>Instituto del Verbo Encarnado (IVE)</h2>
                <div class="row">
                    <div class="col-md-3 m-w3ls">
                        <div class="col-md1">
                            <a href="http://www.verboencarnado.net/es/who-are-we/institute-of-the-incarnate-word-charism" target="_blank">
                                
                                <img src="img/cabpie/pie/4521780_orig.jpg?v=<?php echo $webVersion; ?>" alt="Nuestra Carisma" class="imgs"/>
                                <div class="big-data">
                                <h4>Nuestra Carisma</h4>
                                </div>
                            </a>
                        </div>                        
                    </div>
                    <div class="col-md-3 m-w3ls">
                        <div class="col-md1">
                        <a href="http://www.verboencarnado.net/es/what-do-we-do/institute-of-the-incarnate-word-apostolate" target="_blank">
                            <img src="img/cabpie/pie/4694864_orig.jpg?v=<?php echo $webVersion; ?>" alt="Apostolado" class="imgs">
                            <div class="big-data">
                                <h4>Apostolado</h4>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="col-md-3 m-w3ls">
                        <div class="col-md1">
                        <a href="http://www.verboencarnado.net/index.php?option=com_content&view=article&id=71&Itemid=203&lang=es" target="_blank">
                            <img src="img/cabpie/pie/84807_orig.jpg?v=<?php echo $webVersion ?>" alt="Vida Contemplativa" class="imgs">
                            <div class="big-data">
                                <h4>Vida Contemplativa</h4>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="col-md-3 m-w3ls">
                        <div class="col-md1">
                        <a href="#"  target="_blank">
                            <img src="img/cabpie/pie/8735581_orig.jpg?v<?php echo $webVersion; ?>" alt="Vocación" class="imgs">
                            <div class="big-data">
                                <h4>Vocación</h4>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>
            </footer>
                <ul class="listas">
            <div class="row">
                    
                </div>
                </ul>
        </div>
        <?php
        $jquery = Funciones::conexion('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js');
        echo (Funciones::retornaJS($jquery, 'js/jquery'));

        $popper = Funciones::conexion('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
        echo (Funciones::retornaJS($popper, 'js/popper'));

        $bootstrap = Funciones::conexion('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js');
        echo (Funciones::retornaJS($bootstrap));

        for( $f=0; $f<count($varAcces['librerias']); $f++ ){
            switch($varAcces['librerias'][$f]){
                case 'fullcalendar':
                    
                break;
            }
        }

        ?>
        <script type="text/javascript" language="javascript" src="js/cabpie/funciones.js?v=<?php echo $webVersion; ?>"></script>
        <script type="text/javascript" language="javascript" src="js/<?php echo $pagina; ?>/funciones.js?v=<?php echo $webVersion; ?>"></script>
    </body>

</html>