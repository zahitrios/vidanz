@extends('layouts/master')

@section('content')
   EDITOR DE SUCURSALES
   <br><br>

   	

	<!-- FORMULARIO DE EDICION ROLES -->
	<div id="divIdNuevoModulo" class="admin-form" style="display:block;">
			{{ Form::open(array('url' => 'saveEditSucursal')) }}
				<div class="row">
		        	<div id="spy2" class="section-divider divisorTitulo">
		        		<span>Edición de Sucursal</span>
		        	</div>
		    	</div>

	    	<div class="row">
	            <div class="col-md-4">
	              	<div class="section">
		            	<input value="{{ $data["sucursal"]->idsucursal }}"" required id="idsucursal" type="hidden" name="idsucursal" placeholder="ID" class="gui-input" style="height: 26px;" >		                  	
		                <p class="form-control-static text-muted" style="color:#409ba8 !important" >ID: <strong>{{ $data["sucursal"]->idsucursal }}</strong></p>
	              		
	              		
	              		<br><br>
						<label class="field prepend-icon">
							<input required value="{{ $data["sucursal"]->nombre }}"  id="nombre" type="text" name="nombre" placeholder="Nombre" class="gui-input" style="height: 26px;">							
							<label for="class" class="field-icon"><i class="fas fa-file-signature" style="top:-7px;"></i></label>
						</label>

						<br><br>
						<label class="field prepend-icon">
							<input  value="{{ $data["sucursal"]->direccion }}"  id="direccion" type="text" name="direccion" placeholder="Dirección" class="gui-input" style="height: 26px;">							
							<label for="class" class="field-icon"><i class="fas fa-map-marker-alt" style="top:-7px;"></i></label>
						</label>

						
						<br><br>
						<label class="field prepend-icon">
							<input  value="{{ $data["sucursal"]->telefonoUno }}"  id="telefonoUno" type="text" name="telefonoUno" placeholder="Teléfono" class="gui-input" style="height: 26px;">							
							<label for="class" class="field-icon"><i class="fas fa-phone" style="top:-7px;"></i></label>
						</label>

						
						<br><br>
						<label class="field prepend-icon">
							<input  value="{{ $data["sucursal"]->telefonoDos }}"  id="telefonoDos" type="text" name="telefonoDos" placeholder="Teléfono 2" class="gui-input" style="height: 26px;">							
							<label for="class" class="field-icon"><i class="fas fa-phone" style="top:-7px;"></i></label>
						</label>
					</div>
	            </div>
	        </div>

	        <div class="row">

	            <div class="panel-footer" style="margin-top:160px;">
                  	<input type="submit" class="button btn-primary botonMediano"  value="Aceptar" />
                  	&nbsp;&nbsp;&nbsp;
                  	<input type="button" class="button btn-primary botonMediano botonCancelar" onclick="window.location='{{ route("clases") }}'"  value="Cancelar" />                  	
                </div>

	      </div>
	     {{ Form::close() }}
	</div>
	<!-- FORMULARIO DE EDICION POSITIONS -->

	

@endsection

