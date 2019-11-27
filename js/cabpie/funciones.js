function cargarListas(){
    let titulo = [
        'Institute of the Incarnate Word',
        'Discerning a vocation to the Institute of the Incarnate Word',
        'Instituto del Verbo Encarnado (IVE)', 
        'Qué es el Instituto del Verbo Encarnado', 
        'Instituto Servidoras del Señor y de la Virgen de Matará', 
        'Nuestro Carisma',
        'Nuestra Misión en Europa del Norte',
        'Nuestra Devoción a María',
        'Nuestro apostolado',
        'www.iveperu.org',
        'verboencarnadobrasil.org',
        'ivemo.org',
        'www.ivechile.org',
        'vocacionesive.org',
        'Missions of the Institute of the Incarnate Word',
        'www.biblia.verboencarnado.net',
        'www.padrebuela.org',
        'www.teologoresponde.org',
        'www.ejerciciosive.org',
        'www.corneliofabro.org',
        'www.iconos.verboencarnado.net',
        'santotomasdeaquino.verboencarnado.net',
        'monasteriodelpueyo.wordpress.com',
        'www.iveamerica.org',
        'www.vocationsive.org',
        'iveminorseminary.org',
        'ivecuador.org',
        'www.iveroma.org',
        'servidoras.org',
        'SSVM and the Institute of the Incarnate Word',
        'Institute of the Incarnate Word in Asia',
        'Chronicles of the Institute of the Incarnate Word',
        'quenotelacuenten.verboencarnado.net',
        'adgentes.verboencarnado.net',
        'avemaria.verboencarnado.net',
        'tanzania.verboencarnado.net',
        'www.alexandriae.org',
        'www.iveargentina.org',
        'El IVE alrededor del mundo',
        'ive.ph',
        'iveasia.org',
        'www.instituteoftheincarnateword.org',
        'ssvmusa.org'
    ];

    let url = [
        'http://www.verboencarnado.net/en',
        'http://www.vocationsive.org/',
        'http://www.verboencarnado.net/es/',
        'http://www.verboencarnado.net/index.php/es/who-are-we/institute-of-the-incarnate-word-ive',
        'https://www.servidorasdelsenor.org/es',
        'https://www.servidorasdelsenor.org/es/nuestro-carisma',
        'http://misionesive.verboencarnado.net/',
        'http://www.verboencarnado.net/index.php/es/who-are-we/slaves-of-love',
        'http://www.verboencarnado.net/index.php/es/what-do-we-do/apostolate',
        'http://www.iveperu.org/',
        'http://verboencarnadobrasil.org/',
        'http://ivemo.org/',
        'http://www.ivechile.org/',
        'http://vocacionesive.org/',
        'http://www.ivemissions.org',
        'http://biblia.verboencarnado.net/',
        'http://www.padrebuela.org/',
        'http://www.teologoresponde.org/',
        'http://www.ejerciciosive.org/',
        'http://www.corneliofabro.org/',
        'http://iconos.verboencarnado.net/',
        'http://santotomasdeaquino.verboencarnado.net/',
        'http://monasteriodelpueyo.wordpress.com/',
        'http://www.iveamerica.org/',
        'http://www.vocationsive.org/',
        'http://iveminorseminary.org/',
        'http://ivecuador.org/',
        'http://www.iveroma.org/',
        'http://servidoras.org/',
        'http://www.servidorasdelsenor.org/en/institute-incarnate-word-ive-0',
        'http://www.iveasia.org/',
        'http://www.instituteoftheincarnateword.org/',
        'http://quenotelacuenten.verboencarnado.net/',
        'http://adgentes.verboencarnado.net/',
        'http://avemaria.verboencarnado.net/',
        'http://tanzania.verboencarnado.net/',
        'http://www.alexandriae.org/',
        'http://www.iveargentina.org/',
        'http://index.verboencarnado.net/',
        'http://ive.ph/',
        'http://iveasia.org/',
        'http://institutodelverboencarnado.org/',
        'http://ssvmusa.org/'
    ];

    let l1='<div class="row" ><div class="col-md-4">',l2='<div class="col-md-4">',l3='<div class="col-md-4">';
    let long = parseInt( url.length );
    for( let f=0; f<long; f++ ){
        if(f<15){
            l1+=`<li> <a href="${url[f]}">${titulo[f]}</a> </li>`;
        }
        if( f >=15 && f<30 ){
            l2+=`<li> <a href="${url[f]}">${titulo[f]}</a> </li>`;
        }
        if( f >=30 && f<long ){
            l3+=`<li> <a href="${url[f]}">${titulo[f]}</a> </li>`;
        }
    }

    l1+="</div>";
    l2+="</div>";
    l3+="</div></div>";
    let lt = l1+l2+l3;
    $('ul.listas').html(lt);
}

function analizaCorre(mail){
	let k=mail.value;
	let patron=/^\w+([\_.-]\w+)*@[a-z]+([\_.-][a-z]+[a-z])*(\.[a-z]{0,3})$/;
	if( patron.test(k) ){
		elementoId(mail.id).css('border-bottom',' 2px solid rgb(23, 199, 14)');
		return true;
	}else{
		elementoId(mail.id).css('border-bottom',' 2px solid rgb(203,50,52)');
	}
}

function analizaPass(pass){
	let patron= /^\w{1,30}$/;
	if(patron.test(pass.value)){
		elementoId(pass.id).css('border-bottom',' 2px solid rgb(23, 199, 14)');
	}else{
		elementoId(pass.id).css('border-bottom',' 2px solid rgb(203,50,52)');
	}
}

function elementoId(x){
    return $('#'+x);
}

$(document).ready(function(){
    cargarListas();


    $('#formLoginAccess').submit(function(){
        let username = elementoId('username').val().toLowerCase();
        let userpass = elementoId('userpass').val().toLowerCase();

        if( userpass =='' || username =='' ){
            alert("Debe llenar los campos.");
        }

        $.ajax({
            async:true,
            type:'POST',
            url:'util/cabpie/login.php',
            data:{
                usu:username,
                pass:userpass
            },
            dataType:'json',
            cache:false,
            error:function(error, request, status){
                console.log(error);
            },
            success:function(respuesta){
                switch(respuesta.estado){
                    case 1:
                        document.location='';
                        break;
                    case 2:
                        alert(respuesta.mensaje);
                        break;
                }
            }
        });
         
        return false;
    });
});