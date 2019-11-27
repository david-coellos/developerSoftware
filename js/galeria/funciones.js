function queryGalery (){
    $.ajax({
        type:'POST',
        url:'util/galeria/query.php',
        dataType:'json',
        error:function(error, request, status){
            console.log(error);
        },
        success:function(respuesta){
            switch( respuesta.estado ){
                case 1:
                    let data = respuesta.data;
                    let write = '<div class="row">';
                    for( let f=0; f<data.length; f++ ){
                        write+=`<div class='col-2 album' data-key="${data[f]['actividad']}"> <i class="fa fa-folder-open-o fa-3x" aria-hidden="true"></i> <br> ${data[f]['actividad']} <br>${data[f]['fecha']} </div>`;
                    }
                    write+="</div>";
                    $('.galeria').html(write);
                    break;
            }
        }
    });
}

function queryAlbum(album){
    $.ajax({
        type:'POST',
        url:'util/galeria/album.php',
        dataType:'json',
        data:{
            name:album
        },
        error:function(error, request, status){
            console.log(error);
        },
        success:function(respuesta){
            switch( respuesta.estado ){
                case 1:
                    let data = respuesta.data;
                    let album = '';
                    for( let f=0; f<data.length; f++ ){
                        album+=`<img src="util/${data[f]}" width="20%" class="rounded m-1" />`;
                    }
                    $('.elementos').html(album);
                    break;
            }
        }
    });
}

$(document).ready(function(){
    queryGalery();

    $('.galeria').on('click', '.album', function(){
        let id=$(this).attr('data-key');
        queryAlbum(id);
    });
});