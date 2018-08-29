@extends('layouts/master')

@section('content')
   ADMINISTRADOR DE USUARIOS

   <br><br>
   
  	<i class="fa fa-plus-circle botonNuevo" id="botonMas" aria-hidden="true" onclick="muestraFormularioNuevoModulo();" style="margin-bottom:20px;"></i><!-- BOTON DE NUEVO -->
  	<i class="fa fa-minus-circle botonNuevo" id="botonMenos" aria-hidden="true" onclick="ocultaFormularioNuevoModulo();" style="display:none;"></i><!-- BOTON DE NUEVO -->

  	<!-- FORMULARIO DE NUEVOS USUARIOS -->
	<div id="divIdNuevoModulo" class="admin-form">

			{{ Form::open(array('url' => 'usuarios')) }}
				<div class="row">
		        	<div id="spy2" class="section-divider divisorTitulo">
		        		<span>Nuevo Usuario</span>
		        	</div>
		    </div>


	    	<div class="row">
	            <div class="col-md-3">
	              	<div class="section">
	                	<label class="field prepend-icon">
		                  	<input required id="nombre" type="text" name="nombre" placeholder="Nombre(s)" class="gui-input" style="height: 26px;">		                  	
		                  	<label for="nombre" class="field-icon"><i class="fa fa-address-book" style="top:6px;"></i></label>
	                	</label>
	              </div>
	            </div>
	           
	            

	            <div class="col-md-3">
					<div class="section">
						<label class="field prepend-icon">
							<input required  id="user" type="text" name="user" placeholder="Usuario" class="gui-input" style="height: 26px;">							
							<label for="user" class="field-icon"><i class="fas fa-laptop" style="top:6px;"></i></label>
						</label>
					</div>
	            </div>

	            <div class="col-md-3">
					<div class="section">
						<label class="field prepend-icon">
							<input id="pss" type="text" name="pss" placeholder="Password" class="gui-input" style="height: 26px;">							
							<label for="pss" class="field-icon"><i class="fas fa-unlock-alt" style="top:6px;"></i></label>
						</label>
					</div>
	            </div>

	            <div class="col-md-3">
	              	<div class="section">
	                	<label class="field prepend-icon">
		                  	<select name="active" id="active" class="form-control">
									<option value=1>Activo</option>
									<option value=0>Inactivo</option>
							</select>
	                	</label>
	              </div>
	            </div>	


	      	</div>


	      	<div class="row">

	            <div class="col-md-6">
					<div class="section">
						<select name="rol_idrol" id="rol_idrol" class="form-control">
								@foreach($data["roles"] as $key => $rol)
								 	<option value='{{ $rol["idrol"] }}'>{{ $rol["nombre"] }}</option>
								@endforeach
						</select>
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
	
	<!-- FORMULARIO DE NUEVOS USUARIOS -->


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
	      		<th>User</th>	      		
	    		<th>Rol</th>
	    		<th>&nbsp;</th>
	    		<th>&nbsp;</th>
	    	</tr>
	  	</thead>
	  	<tbody>
			
			@foreach($data["usuarios"] as $key => $usuario)
			   <tr>
					<td>{{ $usuario["nombre"] }}</td>
					<td>{{ $usuario["user"] }}</td>
					<td>
						@foreach($data["roles"] as $key => $rol)
							@if($rol["idrol"] == $usuario["rol_idrol"] )
								{{ $rol["nombre"] }}
							@endif
						@endforeach

						
					</td>
					
					<td align="center">
						@if($usuario["active"]==1)
							<i class="fas fa-user-check" style="color:#409ba8; font-size:14px;"></i>
						@else
							<i class="fas fa-user-alt-slash" style="color:#f44336; font-size:14px;"></i>
						@endif

					</td>					
					
					<td align="center">

						@if($usuario["idusuario"]!=1)
								<a href="/usuarios/{{ $usuario["idusuario"] }}/edit" title="Editar datos">
									<i class="fa fa-pencil-square-o botonEditarIcono"  aria-hidden="true"></i>
								</a>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

								@if($usuario["active"]==1)
									<a href="/usuarios/{{ $usuario["idusuario"] }}/disable" title="Deshabilitar" >
										<i class="fas fa-ban  botonEditarIcono"  aria-hidden="true"></i>
									</a>
								@else
									<a href="/usuarios/{{ $usuario["idusuario"] }}/enable" title="Habilitar" >
										<i class="fas fa-check  botonEditarIcono"  aria-hidden="true"></i>
									</a>
								@endif
						@endif

						

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

