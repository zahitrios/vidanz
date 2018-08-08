@extends('layouts/master')

@section('content')
   EDITOR DE USUARIO
   <br><br>

   	

	<!-- FORMULARIO DE EDICION USUARIO -->
	<div id="divIdNuevoModulo" class="admin-form" style="display:block;">

			{{ Form::open(array('url' => 'saveEditUsuario')) }}
				<div class="row">
	        	<div id="spy2" class="section-divider divisorTitulo">
	        		<span>Edición de usuario</span>
	        	</div>
		    </div>

	    	<div class="row">
	            

		            	<input value="{{ $data["usuario"]->idusuario }}"" required id="idusuario" type="hidden" name="idusuario" placeholder="ID" class="gui-input" style="height: 26px;" >		                  	
		                
		                <div class="row">

				            <div class="col-md-3">
				              	<div class="section">
				                	<label class="field prepend-icon">
										<input required value="{{ $data["usuario"]->nombre }}"  id="nombre" type="text" name="nombre" placeholder="Nombre" class="gui-input" style="height: 26px;">							
										<label for="class" class="field-icon"><i class="fa fa-address-book" style="top:-7px;"></i></label>
									</label>
				              	</div>
				            </div>
				            
				            <div class="col-md-3">
				              	<div class="section">
				                	<label class="field prepend-icon">
										<input required value="{{ $data["usuario"]->user }}"  id="user" type="text" name="user" placeholder="User" class="gui-input" style="height: 26px;">							
										<label for="class" class="field-icon"><i class="fas fa-envelope-square" style="top:-7px;"></i></label>
									</label>
				              	</div>
				            </div>

				            <div class="col-md-3">
				              	<div class="section">
				                	<label class="field prepend-icon">
										<input  value=""  id="pss" type="text" name="pss" placeholder="Password (Sólo si se desea cambiar)" class="gui-input" style="height: 26px;">							
										<label for="class" class="field-icon"><i class="fas fa-unlock-alt" style="top:-7px;"></i></label>
									</label>
				              	</div>
				            </div>

				            <div class="col-md-3">
				              	<div class="section">
				                		<label class="field prepend-icon">
											<select name="rol_idrol" id="rol_idrol" class="form-control">
													@foreach($data["roles"] as $key => $rol)									 	
													 	@if($rol["idrol"] == $data["usuario"]->rol_idrol)
													 		<option selected value='{{ $rol["idrol"] }}'>{{ $rol["nombre"] }}</option>
														@else
															<option value='{{ $rol["idrol"] }}'>{{ $rol["nombre"] }}</option>
														@endif
													@endforeach
											</select>
										</label>
				              	</div>
				            </div>

	              		</div>

	              		


					

	            <div class="panel-footer" style="margin-top:160px;">
                  	<input type="submit" class="button btn-primary botonMediano"  value="Aceptar" />
                  	&nbsp;&nbsp;&nbsp;
                  	<input type="button" class="button btn-primary botonMediano botonCancelar" onclick="window.location='{{ route("usuarios") }}'"  value="Cancelar" />                  	
                </div>

	      </div>
	     {{ Form::close() }}
	</div>
	

	

@endsection

