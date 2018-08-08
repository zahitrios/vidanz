@extends('layouts/master')

@section('content')
   EDITOR DE ROLES
   <br><br>

   	

	<!-- FORMULARIO DE EDICION ROLES -->
	<div id="divIdNuevoModulo" class="admin-form" style="display:block;">
			{{ Form::open(array('url' => 'saveEditRol')) }}
				<div class="row">
	        	<div id="spy2" class="section-divider divisorTitulo">
	        		<span>Edición de rol</span>
	        	</div>
		    </div>

	    	<div class="row">
	            <div class="col-md-4">
	              	<div class="section">

		            	<input value="{{ $data["rol"]->idrol }}"" required id="idrol" type="hidden" name="idrol" placeholder="ID" class="gui-input" style="height: 26px;" >		                  	
		                <p class="form-control-static text-muted" style="color:#409ba8 !important" >ID: <strong>{{ $data["rol"]->idrol }}</strong></p>
	              		
	              		
	              		<br><br>
						<label class="field prepend-icon">
							<input required value="{{ $data["rol"]->nombre }}"  id="nombre" type="text" name="nombre" placeholder="Nombre" class="gui-input" style="height: 26px;">							
							<label for="class" class="field-icon"><i class="fa fa-flag" style="top:-7px;"></i></label>
						</label>

						<br><br>
						<label class="field prepend-icon">
							<input required value="{{ $data["rol"]->descripcion }}"  id="descripcion" type="text" name="descripcion" placeholder="Descripcion" class="gui-input" style="height: 26px;">							
							<label for="class" class="field-icon"><i class="fa fa-flag" style="top:-7px;"></i></label>
						</label>
					</div>
	            </div>

	            <div class="panel-footer" style="margin-top:160px;">
                  	<input type="submit" class="button btn-primary botonMediano"  value="Aceptar" />
                  	&nbsp;&nbsp;&nbsp;
                  	<input type="button" class="button btn-primary botonMediano botonCancelar" onclick="window.location='{{ route("roles") }}'"  value="Cancelar" />                  	
                </div>

	      </div>
	     {{ Form::close() }}
	</div>
	<!-- FORMULARIO DE EDICION POSITIONS -->

	

@endsection

