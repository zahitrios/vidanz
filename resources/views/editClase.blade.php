@extends('layouts/master')

@section('content')
   EDITOR DE CLASES
   <br><br>

   	

	<!-- FORMULARIO DE EDICION ROLES -->
	<div id="divIdNuevoModulo" class="admin-form" style="display:block;">
			{{ Form::open(array('url' => 'saveEditClase')) }}
				<div class="row">
	        	<div id="spy2" class="section-divider divisorTitulo">
	        		<span>Edición de sucursal</span>
	        	</div>
		    </div>

	    	<div class="row">
	            <div class="col-md-4">
	              	<div class="section">

		            	<input value="{{ $data["clase"]->idclase }}"" required id="idclase" type="hidden" name="idclase" placeholder="ID" class="gui-input" style="height: 26px;" >		                  	
		                <p class="form-control-static text-muted" style="color:#409ba8 !important" >ID: <strong>{{ $data["clase"]->idclase }}</strong></p>
	              		
	              		
	              		<br><br>
						<label class="field prepend-icon">
							<input required value="{{ $data["clase"]->nombreClase }}"  id="nombreClase" type="text" name="nombreClase" placeholder="Nombre" class="gui-input" style="height: 26px;">							
							<label for="class" class="field-icon"><i class="fas fa-shoe-prints" style="top:-7px;"></i></label>
						</label>

						
					</div>
	            </div>

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

