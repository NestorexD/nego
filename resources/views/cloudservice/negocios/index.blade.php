@extends('layoults.negocios')
@section('content')

<!-- Esto se agrega para que reconosca el AJAX en laravel -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Incluimos la libreria JQUERY -->
<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/logica.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/map-style.css') }}">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHgssoJjNa-ZrKaoBl566khLe40j9UGfw"></script>
	  
<!-- DIV DONDE ESTARA EL MAPA OCULTO ESPERANDO EL EVENTO DE ACTIVACION -->
	<div class="overlay">
     <div class="map">
       <div id="titulo"><h2 id="nombre_negocio"></h2></div>
       <div id="map-canvas"></div>
       <div id="direccion"><h3 id="direccion_negocio"></h3></div>
     </div>
   </div>


      <h1 class="text-center" >Busca y encuentra en Arequipacosas</h1>
      <div class="row margintop-50">                
        <div class="col-md-6 col-md-offset-3">
            
           @include('cloudservice.negocios.search')

        </div>
      </div>    
    </div>
  </section>
  	
  <div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="/arequipacosas/arequipacosas">Arequipacosas</a></li>
					<li><a href="/arequipacosas/somos_arequipacosas">Negocios</a></li>
					<li class="active">1</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs--> 
	<!--table-->
  
  <div class="container"> 
    <div id="description">
      <div class="row">
        <div id="contenido" class="col-md-8">  
 							
		</div>	
					
	<!--end-single-->

        <div class="col-md-4">
          <div class="w_sidebar">

            	@include('cloudservice.negocios.filtros')

  			</div>
        </div>
    </div>
   </div>

   <div class="container margintop-50 marginbot-50">
		<div class="linea-horizon "></div>
	</div>


@endsection 


