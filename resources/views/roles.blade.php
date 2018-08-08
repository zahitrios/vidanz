@extends('layouts/master')

@section('content')
   ADMINISTRADOR DE ROLES
   <br><br>

   	

  	<i class="fa fa-plus-circle botonNuevo" id="botonMas" aria-hidden="true" onclick="muestraFormularioNuevoModulo();" style="margin-bottom:20px;"></i><!-- BOTON DE NUEVO -->
  	<i class="fa fa-minus-circle botonNuevo" id="botonMenos" aria-hidden="true" onclick="ocultaFormularioNuevoModulo();" style="display:none;"></i><!-- BOTON DE NUEVO -->

	
	<!-- FORMULARIO DE NUEVOS ROLES -->
	<div id="divIdNuevoModulo" class="admin-form">
			{{ Form::open(array('url' => 'roles')) }}
				<div class="row">
	        	<div id="spy2" class="section-divider divisorTitulo">
	        		<span>Nuevo rol</span>
	        	</div>
		    </div>

	    	<div class="row">
	            
	            
	            <div class="col-md-6">
					<div class="section">
						<label class="field prepend-icon">
							<input required  id="nombre" type="text" name="nombre" placeholder="Nombre" class="gui-input" style="height: 26px;">							
							<label for="class" class="field-icon"><i class="fa fa-flag" style="top:6px;"></i></label>
						</label>
					</div>
	            </div>

	            <div class="col-md-6">
					<div class="section">
						<label class="field prepend-icon">
							<input   id="descripcion" type="text" name="descripcion" placeholder="Descripción" class="gui-input" style="height: 26px;">							
							<label for="class" class="field-icon"><i class="fa fa-flag" style="top:6px;"></i></label>
						</label>
					</div>
	            </div>

	            <div class="panel-footer">
                  	<input type="submit" class="button btn-primary botonMediano"  value="Guardar" />
                </div>

	      </div>
	     {{ Form::close() }}
	</div>
	<!-- FORMULARIO DE NUEVAS ROLES -->


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
	    		<th>Nombre</th>
	    		<th>Descripción</th>
	    		<th>&nbsp;</th>
	    	</tr>
	  	</thead>
	  	<tbody>
			
			@foreach($data["roles"] as $key => $rol)
			   <tr>
					<td>{{ $rol["nombre"] }}</td>
					<td>{{ $rol["descripcion"] }}</td>
					<td align="center">
						<a href="/roles/{{ $rol["idrol"] }}/edit" >
							<i class="fa fa-pencil-square-o botonEditarIcono"  aria-hidden="true"></i>
						</a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="/roles/{{ $rol["idrol"] }}/delete" >
							<i class="fa fa-trash  botonEditarIcono"  aria-hidden="true"></i>
						</a>
					</td>
				</tr>
			@endforeach


		</tbody>
	</table>

@endsection

<script language="javascript">
	
	function muestraFormularioNuevoModulo(){
		$("#divIdNuevoModulo").fadeIn(400);
		$("#botonMenos").show();
		$("#botonMas").hide();
	}

	function ocultaFormularioNuevoModulo(){
		$("#divIdNuevoModulo").fadeOut(400);
		$("#botonMenos").hide();
		$("#botonMas").show();
	}

</script>
