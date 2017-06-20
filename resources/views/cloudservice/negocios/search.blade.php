{!!Form::open(array('url'=>'cloudservice/negocios','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<!--url: es para redireccionar GET:permite filtrar los negocios (negociosController:). role:search-->
	
	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control" name="searchText" placeholder="Buscar negocios... por nombre, rubro, o distrito..." value="{{$searchText}}">
			<span class="input-group-btn">
				<a href=""><button type="submit" class="btn btn-success">Buscar Ahora</button></a>				
			</span>
			
		</div>
	</div>

{{Form::close()}}
