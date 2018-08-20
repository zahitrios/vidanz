@extends('layouts/master')

@section('content')
   ADMINISTRADOR DE SUCURSALES

   <br><br>
   
  	<i class="fa fa-plus-circle botonNuevo" id="botonMas" aria-hidden="true" onclick="muestraFormularioNuevaClase();" style="margin-bottom:20px;"></i><!-- BOTON DE NUEVO -->
  	<i class="fa fa-minus-circle botonNuevo" id="botonMenos" aria-hidden="true" onclick="ocultaFormularioNuevaClase();" style="display:none;"></i><!-- BOTON DE NUEVO -->

  	<!-- FORMULARIO DE NUEVOS CLASES -->
	<div id="divIdNuevoModulo" class="admin-form">

			{{ Form::open(array('url' => 'sucursales')) }}
				<div class="row">
		        	<div id="spy2" class="section-divider divisorTitulo">
		        		<span>Nueva Sucursal</span>
		        	</div>
		    </div>

	    	<div class="row">
	            <div class="col-md-3">
	              	<div class="section">
	                	<label class="field prepend-icon">
		                  	<input required id="nombre" type="text" name="nombre" placeholder="Nombre" class="gui-input" style="height: 26px;">		                  	
		                  	<label for="nombre" class="field-icon"><i class="fas fa-file-signature" style="top:6px;"></i></label>
	                	</label>
	              	</div>
	            </div>

	            <div class="col-md-3">
	              	<div class="section">
	                	<label class="field prepend-icon">
		                  	<input  id="direccion" type="text" name="direccion" placeholder="Dirección" class="gui-input" style="height: 26px;">		                  	
		                  	<label for="direccion" class="field-icon"><i class="fas fa-map-marker-alt" style="top:6px;"></i></label>
	                	</label>
	              	</div>
	            </div>


	            <div class="col-md-3">
	              	<div class="section">
	                	<label class="field prepend-icon">
		                  	<input  id="telefonoUno" type="text" name="telefonoUno" placeholder="Teléfono" class="gui-input" style="height: 26px;">		                  	
		                  	<label for="telefonoUno" class="field-icon"><i class="fas fa-phone" style="top:6px;"></i></label>
	                	</label>
	              	</div>
	            </div>


	            <div class="col-md-3">
	              	<div class="section">
	                	<label class="field prepend-icon">
		                  	<input  id="telefonoDos" type="text" name="telefonoDos" placeholder="Teléfono (2)" class="gui-input" style="height: 26px;">		                  	
		                  	<label for="telefonoDos" class="field-icon"><i class="fas fa-phone" style="top:6px;"></i></label>
	                	</label>
	              	</div>
	            </div>

	      	</div>

			<div class="row">
				<div class="panel-footer">
			      	<input type="submit" class="button btn-primary botonMediano"  value="Guardar" />
			    </div>
			</div>
	    </div>
	     {{ Form::close() }}
	
	<!-- FORMULARIO DE NUEVAS CLASES -->


	<!-- MENSAJES -->
	<div class="special-alerts">    	
		<div id="alert" class="alert alert-info alert-dismissable" style="display: {{$data["displayMensaje"]}};">
	  		<button type="button" onclick="$('#alert').fadeOut(400);" aria-hidden="true" class="close">×</button>
	  		<i class="fa fa-info pr10"></i>
	  		<span id="mensajeCallBack">
	  			{{$data["mensaje"]}}
	  		</span>
		</div>
  	</div>
  	<!-- MENSAJES -->



	<!-- LA TABLA PRINCIPAL -->
   <table class="table table-bordered table-hover table-striped mbn" >
	  	<thead>
	    	<tr class="system">
	      		<th>Sucursal</th>
	      		<th>Dirección</th>
	      		<th>Teléfono</th>
	      		<th>Teléfono 2</th>
	    		<th>&nbsp;</th>
	    	</tr>
	  	</thead>
	  	<tbody>
			
			@foreach($data["sucursales"] as $key => $sucursal)
			   <tr>
					<td>{{ $sucursal["nombre"] }}</td>
					<td>{{ $sucursal["direccion"] }}</td>
					<td>{{ $sucursal["telefonoUno"] }}</td>
					<td>{{ $sucursal["telefonoDos"] }}</td>
				
					<td align="center">

						<a href="/sucursales/{{ $sucursal["idsucursal"] }}/edit" title="Editar datos">
							<i class="fa fa-pencil-square-o botonEditarIcono"  aria-hidden="true"></i>
						</a>

					</td>

				</tr>
			@endforeach

		</tbody>
	</table>

@endsection



<script language="javascript">
	
	function muestraFormularioNuevaClase(){
		$("#divIdNuevoModulo").fadeIn(400);
		$("#botonMenos").show();
		$("#botonMas").hide();
	}

	function ocultaFormularioNuevaClase(){
		$("#divIdNuevoModulo").fadeOut(400);
		$("#botonMenos").hide();
		$("#botonMas").show();
	}

</script>

