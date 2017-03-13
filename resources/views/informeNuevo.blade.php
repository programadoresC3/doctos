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
                                        <h4 class="margin-none"><i class="fa fa-file-text-o"></i> Informe Personalizado Personal Informática</h4>
                                    </div>
                                </div>

                                <a href="javascript:;" id="btnEnviar" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</a>
                                <div class="separator bottom"></div>
                                <form id="formInforme" action="{{ url('informeInsertar') }}">
                                    <input type="hidden" id="document" value="{{ url('informe_index') }}"/>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="box-generic padding-none overflow-hidden" style="margin-bottom:0;">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Quien Genera?</label>
                                                    <select name="cmbGenera" id="cmbGenera" class="form-control">
                                                        <option value="">Seleccione una Persona</option>
                                                        @foreach($genero as $gen)
                                                            <option value="{{ $gen->id }}">{{ $gen->testigo }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label > Periodo de Informe</label>
                                                    <input type="text" id="txtFecha" name="txtFecha" class="form-control span8" value="" />
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label > Informe de Actividades</label>
                                                    {{--<textarea name="txtInforme" id="txtInforme" rows = 20 class="form-control ckeditor"></textarea>--}}
                                                    <textarea name="txtInforme" id="txtInforme" rows = 20 class="form-control"></textarea>
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
    <script src="{{ url('public/js/informe.js') }}"></script>
@stop