@extends('layouts/master')

@section('content')
   ADMINISTRADOR DE LEADS

   <br><br>
   
  	<i class="fa fa-plus-circle botonNuevo" id="botonMas" aria-hidden="true" onclick="muestraFormularioNuevaClase();" style="margin-bottom:20px;"></i><!-- BOTON DE NUEVO -->
  	<i class="fa fa-minus-circle botonNuevo" id="botonMenos" aria-hidden="true" onclick="ocultaFormularioNuevaClase();" style="display:none;"></i><!-- BOTON DE NUEVO -->

  	<!-- FORMULARIO DE NUEVOS CLASES -->
	<div id="divIdNuevoModulo" class="admin-form">

			{{ Form::open(array('url' => 'leads')) }}
				<div class="row">
		        	<div id="spy2" class="section-divider divisorTitulo">
		        		<span>Alta de lead</span>
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
		                  	<input  id="telefono" type="text" name="telefono" placeholder="Teléfono" class="gui-input" style="height: 26px;">
		                  	<label for="telefono" class="field-icon"><i class="fas fa-phone" style="top:6px;"></i></label>
	                	</label>
	              	</div>
	            </div>


	            <div class="col-md-3">
	              	<div class="section">
	                	<label class="field prepend-icon">
		                  	<input  id="correo" type="text" name="correo" placeholder="Correo" class="gui-input" style="height: 26px;">
		                  	<label for="correo" class="field-icon"><i class="fas fa-at" style="top:6px;"></i></label>
	                	</label>
	              	</div>
	            </div>


	            <div class="col-md-3">
	              	<div class="section">
	                	<label class="field prepend-icon">
		                  	<input  id="facebook" type="text" name="facebook" placeholder="Facebook" class="gui-input" style="height: 26px;">
		                  	<label for="facebook" class="field-icon"><i class="fab fa-facebook-f" style="top:6px;"></i></label>
	                	</label>
	              	</div>
	            </div>

	      	</div>

	      	<div class="row">
	      		<div class="col-md-12">
	              	<div class="section">
	              		<label class="field prepend-icon">
		                  	<input  id="notas" type="text" name="notas" placeholder="Notas" class="gui-input" style="height: 26px;">
		                  	<label for="notas" class="field-icon"><i class="far fa-sticky-note" style="top:6px;"></i></label>
	                	</label>

	                	<input type="hidden" id="usuario_idusuario" name="usuario_idusuario" value="{{$data["usuario_idusuario"]}}">
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
	<div class="panel-menu">
        <input id="fooFilter" type="text" placeholder="Buscar..." class="form-control">
    </div>
    <div class="panel-body pn">
					   <table data-page-navigation=".pagination" data-page-size="20" data-filter="#fooFilter" class="table table-responsive footable table-hover mb">
						  	<thead>
						    	<tr class="system">
						      		<th>&nbsp;</th>
						      		<th>Nombre</th>	      		
						      		<th>Teléfono</th>
						      		<th>Correo</th>
						      		<th>Facebook</th>
						      		<th>Fecha de registro</th>
						      		<th>Notas</th>
						      		<th>&nbsp;</th>						    		
						    	</tr>
						  	</thead>
						  	<tbody>
								
								@foreach($data["leads"] as $key => $lead)
								   <tr>

								   		<td align="center">
								   			@if($lead["alumno"]==0)
												<a href="/alumnos/{{ $lead["idlead"] }}/associate" title="Convertir en alumno">
													<i class="fas fa-graduation-cap botonEditarIcono" style="font-size:24px !important;"  aria-hidden="true"></i>
												</a>
											@else
												<i class="fas fa-graduation-cap botonEditarIcono" style="font-size:24px !important; color:#409ba8 !important;"  aria-hidden="true"></i>
											@endif
										</td>


										<td>{{ $lead["nombre"] }}</td>
										<td>{{ $lead["telefono"] }}</td>
										<td>{{ $lead["correo"] }}</td>
										<td>{{ $lead["facebook"] }}</td>
										<td>{{ date('d-m-Y', strtotime($lead->fechaRegistro)) }} </td>
										<td>{{ $lead["notas"] }}</td>

										<td>
											@if($lead["alumno"]==0)
												<a href="/leads/{{ $lead["idlead"] }}/edit" title="Editar datos">
													<i class="fa fa-pencil-square-o botonEditarIcono"  aria-hidden="true"></i>
												</a>											
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<a href="/leads/{{ $lead["idlead"] }}/delete" >
													<i class="fa fa-trash  botonEditarIcono"  aria-hidden="true"></i>
												</a>
											@endif
										</td>

									</tr>
								@endforeach
							</tbody>
							<tfoot class="footer-menu">
			                    <tr>
			                      <td colspan="5">
			                        <nav class="text-right">
			                          <ul class="pagination hide-if-no-paging"></ul>
			                        </nav>
			                      </td>
			                    </tr>
			                </tfoot>
						</table>
	</div>

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

