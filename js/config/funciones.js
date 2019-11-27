function vistePrevia(files, clases = 'vista-pre') {
    $(`.${clases}`).empty();
    const navegador = window.URL || window.webkitURL;
    for (let f = 0; f < files.length; f++) {
        let url = navegador.createObjectURL(files[f]);
        $(`.${clases}`).append(`<img src="${url}" width="180" class="img-fluid img-responsive m-1 rounded"/>`);
    }
}

function submitFunction(x, url = 'config/querySlider.php') {
    $.ajax({
        async: true,
        type: 'POST',
        cache: false,
        dataType: 'json',
        url: `util/${url}`,
        data: x,
        contentType: false,
        processData: false,
        error: function (error, request, status) {
            console.log(error.responseText);
        },
        success: function (respuesta) {
            switch(respuesta.estado){
                case 1:
                    alert(respuesta.mensaje);
                    document.location='';
                    break;
                case 2:
                    alert(respuesta.mensaje);
                    break;
                case 3:
                    alert(respuesta.mensaje);
                    break;
                default:
                    alert(respuesta.mensaje);
                    break;
            }
        }
    });
}
function fechas() {
    let data;
    let f = new Date();
    let s = f.getSeconds() < 10 ? '0' + f.getSeconds() : f.getSeconds();
    let m = f.getMinutes() < 10 ? '0' + f.getMinutes() : f.getMinutes();
    let h = f.getHours() < 10 ? '0' + f.getHours() : f.getHours();
    let days = f.getFullYear() + '' + f.getMonth() + '' + f.getDate();
    data = days + '_' + h + '' + m + '' + s
    return data;
}
function lagout() {
    document.location = 'util/system/lagout.php';
}

$(document).ready(function () {


    $('input#slider').change(function () {
        let img = $(this)[0].files;
        if( img.length >0 ){
            $('#formSubmit').prop("disabled",false);
        }
        vistePrevia(img);
    });

    $('#formSlider').submit(function (e) {
        e.preventDefault();
        let idFiles = $('input#slider')[0].files;
        
        let formData = new FormData();
        for (let f = 0; f < 5; f++) {
            formData.append(f, idFiles[f]);
        }
        formData.append('text', $('input#txt_name').val());
        formData.append('acti', $('textarea#activ').val());
        formData.append('data', fechas());
        submitFunction(formData);
        return false;
    });

    let tiempo = $('#tiempo').val();
    setInterval(lagout, (parseInt(tiempo) * 60000));

    $('#cerrarSession').click(function () {
        lagout();
    });


    /*
        Vista para la galeria
    */

    $('input#galeria').change(function(){
        let imgs = $(this)[0].files;
        if( imgs.length > 0 ){
            $('#formSubmitGaleria').prop("disabled",false);
            vistePrevia(imgs,"vist-previu");
        }
    });

    $('#formGalery').submit(function(e){
        e.preventDefault();
        let idFilesGalery = $('input#galeria')[0].files;
        let formData = new FormData();
        for( let f=0; f< idFilesGalery.length; f++){
            formData.append(f,idFilesGalery[f]);
        }
        formData.append('text',$('#text_galeria').val());
        formData.append('text_act',$('#text_act').val());
        formData.append('date',fechas());
        submitFunction(formData, "config/queryGalery.php");
        return false;
    });

    // moment.locale("es");
    // $("input[name=dateRange]").daterangepicker({
    //     locale: {
    //         format: "DD/MM/YY",
    //         cancelLabel: "Salir",
    //         applyLabel: "Seleccionar",
    //         firstDayOfWeek: 1,
    //         separator: " hasta ",
    //         firstDay: 1,
    //         weekLabel: "W",
    //         opens: "left"
    //     },

    // }, function (strartDate, endDate, period) {
    //     console.log(strartDate.format("L") + ' - ' + endDate.format('l'));
    // });

    // let cont =1;

    // $('.plus-element').on("click",function(){
    //     let element = document.createElement('input');
    //     element.type='text';
    //     element.name='dateRange';
    //     element.id="dateRange-"+cont;
    //     element.className="form-control"
    //     console.log(element);
    //     cont++;
    // });

});