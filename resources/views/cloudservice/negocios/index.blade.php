@extends('layoults.negocios')
@section('content')
	  
      <h1 class="text-center">Busca y encuentra en Arequipacosas</h1>
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
					<li><a href="/arequipacosas/somos_arequipacosas"> Negocios </a></li>
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
        <div class="col-md-8">  
 			
	        		@foreach ($negocios as $num)	<!--implementar un foreach-->
					<table class="table table-bordered">				  
					  <tbody>
					    <tr>
					      <td scope="row" rowspan="5"><img src="{{asset('/images/'.$num->imagen_00)}}" class="borde-img"></td>	      
					    </tr>
					    <td colspan="2"><a href="{{URL::action('NegociosController@show', $num->nombre_negocio)}}"><h1>{{ $num->nombre_negocio }}</h1></a></td>				     
					    </tr>
					    <tr>
					      <td class="direccion">{{ $num->direccion}}, {{$num->distrito}}</td>		     
					    </tr>
					    <tr>
					      <td class="telefono"><i class="fa fa-phone-square" aria-hidden="true"></i> {{ $num->telefonos }}</td>
					    </tr>
					    <tr>				 
					       <td class="ubicacion"><i class="fa fa-street-view" aria-hidden="true">Ubicación</td>					   
					      <td class="rubro"><h5>{{ $num->rubro }}</h5></td>

					    </tr>				    
					  </tbody>
					</table>
					
					@endforeach				
			{{ $negocios->render()}}				
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


