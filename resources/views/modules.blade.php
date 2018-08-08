@extends('layouts/master')

@section('content')
   ADMINISTRADOR DE MÓDULOS DEL SISTEMA
   <br><br>

   	

  <i class="fa fa-plus-circle botonNuevo" id="botonMas" aria-hidden="true" onclick="muestraFormularioNuevoModulo();" style="margin-bottom:20px;"></i><!-- BOTON DE NUEVO -->
  <i class="fa fa-minus-circle botonNuevo" id="botonMenos" aria-hidden="true" onclick="ocultaFormularioNuevoModulo();" style="display:none;"></i><!-- BOTON DE NUEVO -->

	<!-- FORMULARIO DE NUEVOS MÓDULOS -->
	<div id="divIdNuevoModulo" class="admin-form">
			{{ Form::open(array('url' => 'addModule')) }}
				<div class="row">
	        	<div id="spy2" class="section-divider divisorTitulo">
	        		<span>Nuevo Módulo</span>
	        	</div>
		    </div>

	    	<div class="row">
	            
	            
	            <div class="col-md-6">
	              	<div class="section">
						<label class="field prepend-icon">
							<input required  id="label" type="text" name="label" placeholder="Label (Controller)" class="gui-input" style="height: 26px;">							
							<label for="label" class="field-icon"><i class="fa fa-tag" style="top:6px;"></i></label>
						</label>
	              	</div>
	            </div>

	            <div class="col-md-6">
					<div class="section">
						<label class="field prepend-icon">
							<input required  id="class" type="text" name="class" placeholder="Class (Icon)" class="gui-input" style="height: 26px;">							
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
	<!-- FORMULARIO DE NUEVOS MÓDULOS -->

	
	<!-- MENSAJES -->
	<div class="special-alerts">    	
		<div id="alert" class="alert alert-info alert-dismissable" style="display: none;">
	  		<button type="button" onclick="$('#alert').fadeOut(400);" aria-hidden="true" class="close">×</button>
	  		<i class="fa fa-info pr10"></i>
	  		<span id="mensajeCallBack"></span>
		</div>
  	</div>
  	<!-- MENSAJES -->



  	<!-- LA TABLA PRINCIPAL -->
   <table class="table table-bordered table-hover table-striped mbn" >
	  	<thead>
	    	<tr class="system">	      		
	      		<th>Label (Controller)</th>
	      		<th>Class (Icon) <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/"><i class="fa fa-question-circle" aria-hidden="true"></i></a></th>	      
	    		<th>Positions</th>
	    	</tr>
	  	</thead>
	  	<tbody>
			
			@foreach($data["modulos"] as $key => $modulo)
			   <tr>					
					<td>{{ $modulo["nombre"] }}</td>
					
					<td> 
						<i class="fa {{ $modulo["class"] }}" aria-hidden="true"></i>
						{{ $modulo["class"] }}
					</td>

					<td>
						@foreach($modulo["positions"] as $idPosition => $position)
							
							<div class="switch round switch-inline switch-primary" >
								@if($position["selected"] === true)
								   	<input type="checkbox" onchange="actualizaPosicionModulo(this);" checked id="{{ $modulo["idmodulos"] }}|{{ $idPosition }}">
                                	<label for="{{ $modulo["idmodulos"] }}|{{ $idPosition }}">&nbsp;</label>
								@else
								    <input type="checkbox" onchange="actualizaPosicionModulo(this);"  id="{{ $modulo["idmodulos"] }}|{{ $idPosition }}">
                                	<label for="{{ $modulo["idmodulos"] }}|{{ $idPosition }}">&nbsp;</label>
								@endif	
                            </div>

                            {{ $position["label"] }} 

                            <br>
						@endforeach

					</td>					     
				</tr>
			@endforeach

		</tbody>
	</table>

@endsection

<script language="javascript">
	function actualizaPosicionModulo(elemento){

		var arregloIds=elemento.id.split("|");

		//ARMO LA URL QUE SE VA A MODIFICAR LOS MÓDULOS VÍA AJAX
		var urlAjax="{{ url('/') }}/editModule?idmodulos="+arregloIds[0]+"&id_position="+arregloIds[1]+"&type="+elemento.checked;
		console.log(urlAjax);

		$.ajax({
		  url: urlAjax,		  
		}).done(function(dataResponse) {
			$('#alert').fadeOut(400);
			$('#mensajeCallBack').html(dataResponse);			
			$('#alert').fadeIn(400);

			//setTimeout('location.reload();',500);
		});
		
	}


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
