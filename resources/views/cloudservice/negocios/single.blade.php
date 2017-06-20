@extends('layoults.negocios')

@section('content')

<!-- single -->

   <section>
   <div div class="container"> 
    <div class="row">   	 
       <div class="col-md-5 text-right">
          	<div class="team-wrapper-big wow bounceInUp" data-wow-delay="0.1s">
          		<img src="{{asset('/images/'.$negocios->imagen_01)}}" class="img-responsive borde-img zoom" alt="">       
	    	</div>
	    </div>
	   	
     	<div class="col-md-7 text-left">
          </br>
          
          <div class="nombre_negocio"><h1> {{ $negocios->nombre_negocio }} </h1></div>
          <div class="titular_negocio"><h4>Titular o Contacto:</h4><h5>{{ $negocios->nombre_dueno }}</h5></br></div>
          <div class="rating1">
            <span class="starRating">
              <input id="rating5" type="radio" name="rating" value="5" checked="">
              <label for="rating5">5</label>
              <input id="rating4" type="radio" name="rating" value="4">
              <label for="rating4">4</label>
              <input id="rating3" type="radio" name="rating" value="3">
              <label for="rating3">3</label>
              <input id="rating2" type="radio" name="rating" value="2">
              <label for="rating2">2</label>
              <input id="rating1" type="radio" name="rating" value="1">
              <label for="rating1">1</label>
            </span>
          </div>
          <div class="description">
            <h4>Descripcion de la Empresa:</h4><h5> {{ $negocios->descripcion }} </h5></div>
            
          <div class="direccion">
          	<h3>Dirección y Ubicacion del Negocio:</h3><h2>{{ $negocios->direccion }} , {{ $negocios->distrito }}</h2></br>

           <div class="telefono">
            <h4><i class="fa fa-phone-square" aria-hidden="true"></i> {{ $negocios->telefonos }}</h4></div>
            <div class="clearfix"></div>   
  		</div>
    </div>
  </section>


    <div class="container">
	 <div class="arriv ">
	    <div class="arriv-top">
	      <div class="col-md-6 arriv-left">
	        	<div class="team-wrapper-big wow bounceInUp" data-wow-delay="0.1s">
	        		<img src="{{asset('/images/'.$negocios->imagen_02)}}" class="img-responsive borde-img zoom" alt="">
	        	</div>
	      </div>
	      <div class="col-md-6 arriv-right">
	        	<div class="team-wrapper-big wow bounceInUp" data-wow-delay="0.2s">
	        		<img src="{{asset('/images/'.$negocios->imagen_03)}}" class="img-responsive borde-img zoom" alt="">
	        	</div>
	      </div>
	      <div class="clearfix"> </div>
	    </div>

	    <div class="arriv-bottm">
	      <div class="col-md-8 arriv-left1">
	      		<div class="team-wrapper-big wow bounceInUp" data-wow-delay="0.3s">
	        		<img src="{{asset('/images/'.$negocios->imagen_04)}}" class="img-responsive borde-img zoom" alt="">
	        	</div>
	      </div>
	      <div class="col-md-4 arriv-right1">
	        	<div class="team-wrapper-big wow bounceInUp" data-wow-delay="0.4s">	
	        		<img src="{{asset('/images/'.$negocios->imagen_05)}}" class="img-responsive borde-img zoom" alt="">
	        	</div>
	      </div>
	      <div class="clearfix"> </div>
	    </div>

	    <div class="arriv-las">
	      <div class="col-md-6 arriv-left2">
	        	<div class="team-wrapper-big wow bounceInUp" data-wow-delay="0.5s">
	        		<img src="{{asset('/images/'.$negocios->imagen_06)}}" class="img-responsive borde-img zoom" alt="">
	        	</div>

	        	<div class="team-wrapper-big wow bounceInUp margintop-30" data-wow-delay="0.6s">	
	        		<img src="{{asset('/images/'.$negocios->imagen_07)}}" class="img-responsive borde-img zoom" alt="">
	        	</div>
	      </div>
	      <div class="col-md-offset-6 arriv-right2">
	        	<div class="team-wrapper-big wow bounceInUp margintop-10" data-wow-delay="0.7s">	
	        		<img src="{{asset('/images/'.$negocios->imagen_08)}}" class="img-responsive borde-img zoom" alt="">
	        	</div>
	      </div>
	      <div class="clearfix"> </div>
	    </div>
	</div>
</div>


	<div class="container margintop-50 marginbot-50">
		<div class="linea-horizon"></div>
	</div>
@endsection