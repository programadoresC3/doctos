@extends('app')

@section('contenido')
    <div class="row row-app">
        <div class="col-md-12">
            <div class="col-separator col-unscrollable box col-separator-first">
                <div class="col-table">
                    <div class="col-app col-unscrollable">
                        <div class="col-app">
                            <div class="innerAll">
                                <div class="box-generic padding-none overflow-hidden">
                                    <div class="innerAll">
                                        <h4 class="margin-none"><i class="fa fa-file-text-o"></i> Edición de la Incidencia</h4>
                                    </div>
                                </div>

                                <a href="javascript:;" id="btnEnviar" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</a>
                                <div class="separator bottom"></div>
                                <form id="formDocumento" action="{{ url('incidencias_actualizar') }}">
                                    <input type="hidden" id="document" value="{{ url('incidencias_index') }}"/>
                                    <input type="hidden" id="txtId" name="txtId" value="{{ $laincidencia->id }}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="box-generic padding-none overflow-hidden" style="margin-bottom:0;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Fecha de la Incidencia</label>
                                                    <input type="text" id="txtFechaincidencia" name="txtFechaincidencia" class="form-control span8" value="{{ $laincidencia->fechaIncidencia }}" />
                                                </div>

                                                <div class="form-group">
                                                    <label >Quien Genera?</label>
                                                    <select name="cmbGenera" id="cmbGenera" class="form-control">
                                                        <option value="">Seleccione una Persona</option>
                                                        @foreach($genero as $gene)
                                                            @if($gene->id == $laincidencia->idGen)
                                                                <option value="{{ $gene->id }}" selected="selected">{{ $gene->testigo }}</option>
                                                            @else
                                                                <option value="{{ $gene->id }}">{{ $gene->testigo }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="widget">

                                                    <!-- Widget heading -->
                                                    <div class="widget-head">
                                                        <h4 class="heading">Tipo de Incidencia</h4>
                                                    </div>
                                                    <!-- // Widget heading END -->

                                                    <div class="widget-body innerAll inner-2x">
                                                        <div class="checkbox">
                                                            <label class="checkbox-custom">
                                                                <input type="checkbox" id="chkOmision" name="chkOmision" @if($laincidencia->salida == 1) checked="checked" @endif >
                                                                <i class="fa fa-fw fa-square-o"></i> Omision de Salida
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-custom">
                                                                <input type="checkbox" id="chkEntrada" name="chkEntrada" @if($laincidencia->entrada == 1) checked="checked" @endif >
                                                                <i class="fa fa-fw fa-square-o"></i> Omision de Entrada
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-custom">
                                                                <input type="checkbox" id="chkMedica" name="chkMedica" @if($laincidencia->incapacidad == 1) checked="checked" @endif >
                                                                <i class="fa fa-fw fa-square-o"></i> Incapacidad Medica
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-custom">
                                                                <input type="checkbox" id="chkComision" name="chkComision" @if($laincidencia->comision == 1) checked="checked" @endif >
                                                                <i class="fa fa-fw fa-square-o"></i> Comision
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Observaciones de la Incidencia</label>
                                                    <textarea name="txtObservacion" id="txtObservacion" rows = 6 class="form-control">{{ $laincidencia->observaciones }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label >Observación interna</label>
                                                    <textarea name="txtComentario" id="txtComentario" rows = 3 class="form-control">{{ $laincidencia->comentarioJefe }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label >Estatus</label>
                                                    <select name="cmbEstatus" id="cmbEstatus" class="form-control">
                                                        <option value="Pendiente" @if($laincidencia->estatus == 'Pendiente') selected="selected" @endif>Pendiente</option>
                                                        <option value="Correccion" @if($laincidencia->estatus == 'Correccion') selected="selected" @endif>Correccion</option>
                                                        @if(request()->session()->get('usuario')->nivel == 2)
                                                            <option value="Autorizado" @if($laincidencia->estatus == 'Autorizado') selected="selected" @endif>Autorizado</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ url('resources/assets/components/common/forms/elements/fuelux-checkbox/fuelux-checkbox.js') }}"></script>
    <script src="{{ url('public/js/incidencia_editar.js') }}"></script>
@stop