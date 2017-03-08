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
                                        <h4 class="margin-none"><i class="fa fa-file-text-o"></i> Datos de la Incidencia</h4>
                                    </div>
                                </div>

                                <a href="javascript:;" id="btnEnviar" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</a>
                                <div class="separator bottom"></div>
                                <form id="formDocumento" action="{{ url('incidencias_grabar') }}">
                                    <input type="hidden" id="document" value="{{ url('incidencias_index') }}"/>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="box-generic padding-none overflow-hidden" style="margin-bottom:0;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Fecha de la Incidencia</label>
                                                    <input type="text" id="txtFechaincidencia" name="txtFechaincidencia" class="form-control span8" value="" />
                                                </div>

                                                <div class="form-group">
                                                    <label >Quien Genera?</label>
                                                    <select name="cmbGenera" id="cmbGenera" class="form-control">
                                                        <option value="">Seleccione una Persona</option>
                                                        @foreach($genero as $gen)
                                                            <option value="{{ $gen->id }}">{{ $gen->testigo }}</option>
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
                                                                <input type="checkbox" id="chkOmision" name="chkOmision">
                                                                <i class="fa fa-fw fa-square-o"></i> Omision de Salida
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-custom">
                                                                <input type="checkbox" id="chkEntrada" name="chkEntrada">
                                                                <i class="fa fa-fw fa-square-o"></i> Omision de Entrada
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-custom">
                                                                <input type="checkbox" id="chkMedica" name="chkMedica">
                                                                <i class="fa fa-fw fa-square-o"></i> Incapacidad Medica
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="checkbox-custom">
                                                                <input type="checkbox" id="chkComision" name="chkComision">
                                                                <i class="fa fa-fw fa-square-o"></i> Comision
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Observaciones de la Incidencia</label>
                                                    <textarea name="txtObservacion" id="txtObservacion" rows = 12 class="form-control"></textarea>
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
    <script src="{{ url('public/js/incidencia.js') }}"></script>
@stop