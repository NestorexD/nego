var zonas = [];
var query = "";
var f_rubro = "";
// en la varible zonas tendremos los distritos seleccionados por el usuario y query es la busqueda por texto que hara el usuario

//esta sera una lista que llenaremos con los objetos negocio que esten actualmente mostrandose 
var datos_negocios = [];

// creamos una clase negocio que encapsulara datos importantes de los negocios como nombre y posicion
function Negocio(nombre,direccion,latitud,longitud) {
  	var obj = {};
	obj.nombre = nombre;
	obj.direccion = direccion;
	obj.latitud = latitud;
	obj.longitud = longitud;
	return obj;
}


function buscar(a){
	//al comienzo vaciamos la lista
	datos_negocios = [];

	// si a == 1 entonces tendra que leer el texto de busqueda
	if(a){
    	query=$('input[name="searchText"]').val();
    }
	zonas = [];
	// en esta  parte recorremos cada checkbox y vemos cual esta actualemnte marcado para ponerlo en la lista
	$('input[name="zona"]:checked').each(function()
    {
        zonas.push($(this).val());
    });

    $('input[name="rubro"]:checked').each(function()
    {
        f_rubro=$(this).val();
    });

	$.ajax({
        url: '/buscar',
        type:"POST",
        //ponemos los datos que iran en la consulta
        data: {busqueda:query,zona:zonas,rubro:f_rubro}, 
        success: function(result){
        	//limpiamos el contenido anterior para poner el nuevo
        	$('#contenido').empty();
          for(i=0;i<result.negocios.length;i++){
          	//sacamos cada campo de los resultados para mostrarlos
	          imagen = "images/"+result.negocios[i].imagen_00;
	          nombre = result.negocios[i].nombre_negocio;
	          direccion = result.negocios[i].direccion;
	          distrito = result.negocios[i].distrito;
	          telefono = result.negocios[i].telefonos;
	          rubro = result.negocios[i].rubro;
	          pos =  result.negocios[i].gps;
	          latitud =  pos.split(",")[0];
	          longitud = pos.split(",")[1];
	          //creamos un nuevo objeto y lo agregamos a la lista de negocios
	          var nego = Negocio(nombre,direccion+","+distrito,latitud,longitud);
	          datos_negocios.push(nego);

	          //creamos una tabla la cual mostrara el resultado y lo agregamos al div principal
	          $('#contenido').append('<table class="table table-bordered">'+
	          							'<tbody>'+
	          								'<tr>'+
	          									'<td scope="row" rowspan="5">'+
	          										'<img src="'+imagen+'" class="borde-img" alt="Arequipacosas arequipacosas.com">'+
	          									'</td>'+
	          								'</tr>'+
	          								'<tr>'+
	          								'<td colspan="2"><a href="mostrar/'+nombre+'"><h1>'+nombre+'</h1></a></td>'+
	          								'</tr>'+
	          								'<tr>'+
	          								'<td class="direccion">'+direccion+','+distrito+'</td>'+
	          								'</tr>'+
	          								'<tr>'+
	          								'<td class="telefono"><i class="fa fa-phone-square" aria-hidden="true"></i>'+telefono+'</td>'+
	          								'</tr>'+
	          								'<tr>'+
	          								'<td class="ubicacion" id = "'+i+'"><i class="fa fa-street-view" aria-hidden="true">Ubicación</td><td class="rubro"><h5>'+rubro+'</h5></td>'+
	          								'</tr>'+
	          							'</tbody>'+
	          						'</table>');
        	}

        },
        dataType:"json",
        async: false
  	});
}

// funcion que crea la ventana del mapa con los valores determinados
function showMap( latitud , longitud , nombre ,direccion ) {
      var mapOptions = {
        center: { lat: latitud, lng: longitud },
        zoom: 16
      };
      var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
      var marker = new google.maps.Marker({
          position: {lat: latitud, lng: longitud},
          map: map
      });
      $('#nombre_negocio').text(nombre);
      $('#direccion_negocio').text(direccion);
  }


$(document).ready(function () {

	//esto es por default para que corra el ajax en laravel
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	//al comienzo buscamos todos los negocios
	buscar(0);
	//activa el evento buscar con valor 1 lo que significa que leera el input 
    $('#boton_buscar').click(function(){
    	buscar(1);
    });

    //activa el elemento con valor 0 lo que significa que no leera el input
    $('input[name="zona"]').on('change', function (e) {
        buscar(0);
    });
    $('input[name="rubro"]').on('change', function (e) {
        buscar(0);
    });

    //funciones para el mapa

    var activar = false;

    $(".overlay, .map").click(function(){
        var text = $(this).attr("class");
        if(text == "map"){
          activar=true;
        }
        else{
          if(activar== true){
            activar=false;
          }
          else{
            $(".overlay").hide();
          }
        }
      });

    //verificamos si se hiso click en alguna ubicacion sacamos su id para poder buscarlo en la lista de los negocios
    $("#contenido").on("click", ".ubicacion", function() {
		id = $( this ).attr('id');
		nombre = datos_negocios[id].nombre;
		direccion = datos_negocios[id].direccion;
		latitud = datos_negocios[id].latitud;
		longitud = datos_negocios[id].longitud;
		$(".overlay").show();
        showMap(parseFloat(latitud),parseFloat(longitud),nombre,direccion);
   });

});

//funcion que capta el evento al pulsar la tecla ESC
$(document).keyup(function(e) {
    if (e.keyCode == 27) { // tecla ESC es igual a 27
        $(".overlay").hide();
    }
});