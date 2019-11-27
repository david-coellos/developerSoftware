function cargarSlider(){
    $.ajax({
        async:false,
        url:'util/inicio/query.php',
        dataType:'json',
        error:function(error, status, request){
            console.log(error);
        },
        success:function(respuesta){
            switch( respuesta.estado ){
                case 1:
                    let data = respuesta.data;
                    let carrusel = '';
                    for ( let f=0; f<data.length; f++ ){
                        if( f==0 ){
                            carrusel += ` <div class="carousel-item active" > <img src="util/${data[f]}" class="d-block W-100" width="100%" height="350px"> </div> `;
                        }else{
                            carrusel += ` <div class="carousel-item" >  <img src="util/${data[f]}" class="d-block W-100" width="100%" height="350px">  </div> `;
                        }
                    }
                    $('.carrusel').html(carrusel);
                    break;
                case 2:
                    $('#carouselExampleFade').show('fade');

                    let msj = `
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Hola Bienvenido</strong> ${respuesta.mensaje}
                    </div>
                    `;

                    $('#carouselExampleFade').html(msj);
                    break;
            }
        }
    });
}

$(document).ready(function(){
    cargarSlider();
});