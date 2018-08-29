@extends('layouts/master')

@section('content')
  <section id="content" class="table-layout animated fadeIn">
      <div class="tray tray-center">    
            ADMINISTRADOR DE ALUMNOS

           <br><br>
            
          @if($data["edit"]==0)
            <i class="fa fa-plus-circle botonNuevo" id="botonMas" aria-hidden="true" onclick="muestraFormularioNuevoModulo();" style="margin-bottom:20px;"></i><!-- BOTON DE NUEVO -->
            <i class="fa fa-minus-circle botonNuevo" id="botonMenos" aria-hidden="true" onclick="ocultaFormularioNuevoModulo();" style="display:none;"></i><!-- BOTON DE NUEVO -->
          @endif


          <!-- FORMULARIO DE NUEVOS ALUMNOS -->
          <div @if($data["edit"]==0) id="divIdNuevoModulo" @endif class="admin-form">

                  @if($data["edit"]==0) 
                    {{ Form::open(array('url' => 'alumnos')) }}
                    <input type="hidden" id="usuario_idusuario" name="usuario_idusuario" value="{{$data["usuario_idusuario"]}}">
                  @endif
                  @if($data["edit"]==1)
                    {{ Form::open(array('url' => 'savealumno')) }}
                    <input type="hidden" id="idalumno" name="idalumno" value="{{$data["alumno"]["idalumno"]}}">
                  @endif
                  @if($data["edit"]==2)
                    {{ Form::open(array('url' => 'associateLeadAlumno')) }}
                    <input type="hidden" id="lead_idlead" name="lead_idlead" value="{{$data["idlead"]}}">
                    <input type="hidden" id="usuario_idusuario" name="usuario_idusuario" value="{{$data["usuario_idusuario"]}}">
                  @endif



                <div class="row">
                      <div id="spy2" class="section-divider divisorTitulo">
                          @if($data["edit"]==1)
                            <span>Edición de alumno</span>                               
                          @else
                            <span>Nuevo alumno</span>
                          @endif
                      </div>
                </div>


                <div class="row">

                      <div class="col-md-3">
                          <div class="section">
                              <label class="field prepend-icon">
                                  <input required id="nombre" type="text" name="nombre" placeholder="Nombre(s)" class="gui-input" style="height: 26px;" 
                                    @if($data["edit"]==1)
                                      value="{{$data["alumno"]["nombre"]}}"
                                    @endif
                                    @if($data["edit"]==2)
                                      value="{{$data["lead"]["nombre"]}}" 
                                    @endif
                                  >
                                  <label for="nombre" class="field-icon"><i class="fas fa-address-book" style="top:6px;"></i></label>
                              </label>
                          </div>
                      </div>

                      <div class="col-md-3">
                          <div class="section">
                            <label class="field prepend-icon">
                                <input  id="telefono" type="text" name="telefono" placeholder="Teléfono" class="gui-input" style="height: 26px;" 
                                   @if($data["edit"]==1)
                                      value="{{$data["alumno"]["telefono"]}}"
                                    @endif
                                    @if($data["edit"]==2)
                                      value="{{$data["lead"]["telefono"]}}"
                                    @endif
                                >
                                <label for="telefono" class="field-icon"><i class="fas fa-phone" style="top:6px;"></i></label>
                            </label>
                          </div>
                      </div>

                      <div class="col-md-3">
                        <div class="section">
                          <label class="field prepend-icon">
                              <input  id="correo" type="text" name="correo" placeholder="Correo" class="gui-input" style="height: 26px;" 
                                @if($data["edit"]==1)
                                  value="{{$data["alumno"]["correo"]}}"
                                @endif
                                @if($data["edit"]==2)
                                  value="{{$data["lead"]["correo"]}}"                                  
                                @endif
                              >
                              <label for="correo" class="field-icon"><i class="fas fa-at" style="top:6px;"></i></label>
                          </label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="section">
                          <label class="field prepend-icon">
                              <input  id="facebook" type="text" name="facebook" placeholder="Facebook" class="gui-input" style="height: 26px;" 
                                @if($data["edit"]==1)
                                  value="{{$data["alumno"]["facebook"]}}"
                                @endif
                                @if($data["edit"]==2)
                                  value="{{$data["lead"]["facebook"]}}"
                                @endif
                              >
                              <label for="facebook" class="field-icon"><i class="fab fa-facebook-f" style="top:6px;"></i></label>
                          </label>
                        </div>
                    </div>
                </div>


                <div class="row">
                  <div class="col-md-12">
                        <div class="section">
                          <label class="field prepend-icon">
                              <input  id="notas" type="text" name="notas" placeholder="Notas" class="gui-input" style="height: 26px;" 
                                @if($data["edit"]==1)
                                  value="{{$data["alumno"]["notas"]}}"
                                @endif
                                @if($data["edit"]==2)
                                  value="{{$data["lead"]["notas"]}}"
                                @endif
                              >
                              <label for="notas" class="field-icon"><i class="far fa-sticky-note" style="top:6px;"></i></label>
                          </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                        <div class="section">
                            Inscrito a:<br><br>
                            @foreach($data["clases"] as $key => $clase)
                                <label class="checkbox-inline mr10">
                                  <input name="claseInscrita_{{$clase["idclase"]}}" id="claseInscrita_{{$clase["idclase"]}}" type="checkbox" value="{{$clase["idclase"]}}" 
                                      @if($data["edit"]==1)
                                        @foreach($data["alumno"]["clases"] as $k => $claseAlumno)
                                          @if($claseAlumno["idclase"]==$clase["idclase"])
                                            checked
                                          @endif
                                        @endforeach
                                      @endif

                                  >{{$clase["nombreClase"]}}
                                </label>
                                <br><br>
                            @endforeach 
                          </select>
                        </div>
                  </div>
                </div>

                <div class="row">
                    <div class="panel-footer">
                        <input type="submit" class="button btn-primary botonMediano"  value="Guardar" />
                        &nbsp;&nbsp;&nbsp;
                        <input type="button" class="button btn-primary botonMediano botonCancelar" onclick="window.location='{{ route("alumnos") }}'"  value="Cancelar" />   
                    </div>
                </div>
              </div>
               {{ Form::close() }}          
          <!-- FORMULARIO DE NUEVOS ALUMNOS -->


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
          <div class="panel-menu" @if($data["edit"]!=0) style='display:none;' @endif>
            <input id="fooFilter" type="text" placeholder="Buscar..." class="form-control">
        </div>
        <div class="panel-body pn" @if($data["edit"]!=0) style='display:none;' @endif>
          <table data-page-navigation=".pagination" data-page-size="20" data-filter="#fooFilter" class="table table-responsive footable table-hover mb">
           
              <thead>
                <tr class="system">                    
                      <th>Nombre</th>
                      <th>Clases</th>
                      <th>Teléfono</th>
                      <th>Correo</th>
                      <th>Facebook</th>
                      <th>Fecha de ingreso</th>                      
                      <th>Notas</th>
                      <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
              
              @foreach($data["alumnos"] as $key => $alumno)
                 <tr>
                  <td>{{ $alumno["nombre"] }}</td>
                  
                  <td align="left" >
                    @foreach($alumno["clases"] as $k => $clase)
                      <span class="fa fas fa-shoe-prints "></span>&nbsp;&nbsp;{{$clase["nombreClase"]}}<br><br>
                    @endforeach  
                  </td>

                  <td>{{ $alumno["telefono"] }}</td>
                  <td>{{ $alumno["correo"] }}</td>
                  <td>{{ $alumno["facebook"] }}</td>
                  <td>{{ date('d-m-Y', strtotime($alumno["fechaIngreso"])) }} </td>
                  

                  <td>{{ $alumno["notas"] }}</td>
                  
                  <td align="center">
                    <a href="/alumnos/{{ $alumno["idalumno"] }}/edit" title="Editar">
                        <i class="fa fa-pencil-square-o botonEditarIcono"  aria-hidden="true"></i>
                      </a>
                  </td>         
                  
                 
                </tr>
              @endforeach

            </tbody>
          </table>
          <tfoot class="footer-menu">
              <tr>
                <td colspan="5">
                  <nav class="text-right">
                    <ul class="pagination hide-if-no-paging"></ul>
                  </nav>
                </td>
              </tr>
          </tfoot>
      </div>
  </section>

@endsection

@section('dialogos')
	
   
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

