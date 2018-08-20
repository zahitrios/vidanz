@extends('layouts/master')

@section('content')
   EDITOR DE LEADS
   <br><br>

   	

	<!-- FORMULARIO DE EDICION ROLES -->
	<div id="divIdNuevoModulo" class="admin-form" style="display:block;">
			{{ Form::open(array('url' => 'saveEditLead')) }}
				<div class="row">
		        	<div id="spy2" class="section-divider divisorTitulo">
		        		<span>Edición de Lead</span>
		        	</div>
		    	</div>

	    	<div class="row">
	            <div class="col-md-4">
	              	<div class="section">
		            	<input value="{{ $data["lead"]->idlead }}"" required id="idlead" type="hidden" name="idlead" placeholder="ID" class="gui-input" style="height: 26px;" >		                  	
		                <p class="form-control-static text-muted" style="color:#409ba8 !important" >ID: <strong>{{ $data["lead"]->idlead }}</strong></p>
	              		
	              		
	              		<br><br>
						<label class="field prepend-icon">
							<input required value="{{ $data["lead"]->nombre }}"  id="nombre" type="text" name="nombre" placeholder="Nombre" class="gui-input" style="height: 26px;">							
							<label for="class" class="field-icon"><i class="fas fa-file-signature" style="top:-7px;"></i></label>
						</label>
						
						<br><br>
						<label class="field prepend-icon">
							<input  value="{{ $data["lead"]->telefono }}"  id="telefono" type="text" name="telefono" placeholder="Teléfono" class="gui-input" style="height: 26px;">							
							<label for="class" class="field-icon"><i class="fas fa-phone" style="top:-7px;"></i></label>
						</label>

						<br><br>
						<label class="field prepend-icon">
							<input  value="{{ $data["lead"]->correo }}"  id="correo" type="text" name="correo" placeholder="Correo" class="gui-input" style="height: 26px;">							
							<label for="class" class="field-icon"><i class="fas fa-at" style="top:-7px;"></i></label>
						</label>

						<br><br>
						<label class="field prepend-icon">
							<input  value="{{ $data["lead"]->facebook }}"  id="facebook" type="text" name="facebook" placeholder="Facebook" class="gui-input" style="height: 26px;">							
							<label for="class" class="field-icon"><i class="fab fa-facebook-f" style="top:-7px;"></i></label>
						</label>

						<br><br>
						<label class="field prepend-icon">
							<input  value="{{ $data["lead"]->notas }}"  id="notas" type="text" name="notas" placeholder="Notas" class="gui-input" style="height: 26px;">							
							<label for="class" class="field-icon"><i class="far fa-sticky-note" style="top:-7px;"></i></label>
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

