@extends('layouts/master')

@section('content')
   ADMINISTRADOR DE CLASES IMPARTIDAS

   <br><br>
   
  	<i class="fa fa-plus-circle botonNuevo" id="botonMas" aria-hidden="true" onclick="muestraFormularioNuevaClase();" style="margin-bottom:20px;"></i><!-- BOTON DE NUEVO -->
  	<i class="fa fa-minus-circle botonNuevo" id="botonMenos" aria-hidden="true" onclick="ocultaFormularioNuevaClase();" style="display:none;"></i><!-- BOTON DE NUEVO -->

  	<!-- FORMULARIO DE NUEVOS CLASES -->
	<div id="divIdNuevoModulo" class="admin-form">

			{{ Form::open(array('url' => 'clases')) }}
				<div class="row">
		        	<div id="spy2" class="section-divider divisorTitulo">
		        		<span>Nueva Clase</span>
		        	</div>
		    </div>

	    	<div class="row">
	            <div class="col-md-12">
	              	<div class="section">
	                	<label class="field prepend-icon">
		                  	<input required id="nombreClase" type="text" name="nombreClase" placeholder="Nombre de la clase" class="gui-input" style="height: 26px;">		                  	
		                  	<label for="nombreClase" class="field-icon"><i class="fas fa-shoe-prints" style="top:6px;"></i></label>
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
	      		<th>Clase</th>
	    		<th>&nbsp;</th>
	    	</tr>
	  	</thead>
	  	<tbody>
			
			@foreach($data["clases"] as $key => $clase)
			   <tr>
					<td>{{ $clase["nombreClase"] }}</td>
				
					<td align="center">

						<a href="/clases/{{ $clase["idclase"] }}/edit" title="Editar datos">
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

