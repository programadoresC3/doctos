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
                                        <h4 class="margin-none"><i class="fa fa-file-text-o"></i> Datos del Documento</h4>
                                    </div>
                                </div>

                                <a href="javascript:;" id="btnEnviar" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</a>
                                <div class="separator bottom"></div>
                                <form id="formDocumento" action="{{ url('docto_grabar') }}">
                                    <input type="hidden" id="document" value="{{ url('doctos_index') }}"/>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="box-generic padding-none overflow-hidden" style="margin-bottom:0;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Quien Genera?</label>
                                                    <select name="cmbGenera" id="cmbGenera" class="form-control">
                                                        <option value="">Seleccione una Persona</option>
                                                        @foreach($losGenera as $gen)
                                                            <option value="{{ $gen->id }}">{{ $gen->testigo }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label >Para quien es?</label>
                                                    <select name="cmbPara" id="cmbPara" class="form-control">
                                                        <option value="">Seleccione a quien va dirigido</option>
                                                        @foreach($paraquienes as $quien)
                                                            <option value="{{ $quien->idp }}">{{ $quien->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label >Tipo de Documento</label>
                                                    <select name="cmbDocumento" id="cmbDocumento" class="form-control">
                                                        <option value="">Seleccione un Tipo</option>
                                                        <option value="Circular">Circular</option>
                                                        <option value="Memorandum">Memorandum</option>
                                                        <option value="Oficio">Oficio</option>
                                                        <option value="Tarjeta">Tarjeta</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label> Defina el Asunto</label>
                                                    <input type="text" id="txtAsuntoresumido" name="txtAsuntoresumido" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label >En caso de ser Oficio, Nombre y Puesto a quien va dirigido?</label>
                                                    <textarea name="txtParaOficio" id="txtParaOficio" rows = 2 class="form-control"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label >Ccp</label>
                                                    <textarea name="txtCcp" id="txtCcp" rows = 4 class="form-control"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label >Fecha</label>
                                                    <input type="text" id="txtFecha" name="txtFecha" class="form-control span8" value=" <?php echo date('d/m/Y') ?>" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Asunto</label>
                                                    <textarea name="txtAsunto" id="txtAsunto" rows = 23 class="form-control ckeditor"></textarea>
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
    <script src="{{ url('public/js/documento.js') }}"></script>
    <script src="{{ url('public/vendors/ckeditor/ckeditor.js') }}"></script>
@stop