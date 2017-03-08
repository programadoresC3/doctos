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
                                        <h4 class="margin-none"><i class="fa fa-file-text-o"></i> Editar Datos del Documento</h4>
                                    </div>
                                </div>

                                <a href="javascript:;" id="btnEnviar" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</a>
                                <div class="separator bottom"></div>
                                <form id="formDocumento" action="{{ url('doctos_actualizar') }}">
                                    <input type="hidden" id="document" value="{{ url('doctos_index') }}"/>
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="box-generic padding-none overflow-hidden" style="margin-bottom:0;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Quien Genera?</label>
                                                    <select name="cmbGenera" id="cmbGenera" class="form-control" >
                                                            @foreach($genera as $gene)
                                                                @if($gene->id == $eldocumento->idGenera)
                                                                    <option value="{{ $gene->id }}" selected="selected">{{ $gene->testigo }}</option>
                                                            @else
                                                                <option value="{{ $gene->id }}">{{ $gene->testigo }}</option>
                                                                @endif
                                                            @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label >Para quien es?</label>
                                                    <select name="cmbPara" id="cmbPara" class="form-control" >
                                                            @foreach($paraqu as $quie)
                                                                @if($quie->idp == $eldocumento->idPara)
                                                                    <option value="{{ $quie->idp }}" selected="selected">{{ $quie->nombre }}</option>
                                                                @else
                                                                    <option value="{{ $quie->idp }}">{{ $quie->nombre }}</option>
                                                                @endif
                                                            @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label >Tipo de Documento</label>
                                                    <select name="cmbDocumento" id="cmbDocumento" class="form-control" >
                                                        <option value="Circular" @if($eldocumento->documento === 'Circular') selected="selected" @endif>Circular</option>
                                                        <option value="Memorandum" @if($eldocumento->documento === 'Memorandum') selected="selected" @endif>Memorandum</option>
                                                        <option value="Oficio" @if($eldocumento->documento === 'Oficio') selected="selected" @endif>Oficio</option>
                                                        <option value="Tarjeta" @if($eldocumento->documento === 'Tarjeta') selected="selected" @endif>Tarjeta</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label> Defina el Asunto</label>
                                                    <input type="text" id="txtAsuntoresumido" name="txtAsuntoresumido" class="form-control" value="{{ $eldocumento->asuntoResumido }}">
                                                </div>

                                                <div class="form-group">
                                                    <label >En caso de ser Oficio, Nombre y Puesto a quien va dirigido?</label>
                                                    <textarea name="txtParaOficio" id="txtParaOficio" rows = 2 class="form-control">{{ $eldocumento->paraOficio }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label >Ccp</label>
                                                    <textarea name="txtCcp" id="txtCcp" rows = 4 class="form-control">{{ $eldocumento->ccp }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label >Fecha (establecer dd/mm/aaaa)</label>
                                                    <input type="text" id="txtFecha" name="txtFecha" class="form-control span8" value=" {{ $eldocumento->fecha }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Asunto</label>
                                                    <textarea name="txtAsunto" id="txtAsunto" rows = 12 class="form-control">{{ $eldocumento->contenido }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label >Observación interna</label>
                                                    <textarea name="txtComentario" id="txtComentario" rows = 3 class="form-control">{{ $eldocumento->comentarioJefe }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label >Estatus</label>
                                                    <select name="cmbEstatus" id="cmbEstatus" class="form-control">
                                                        <option value="Pendiente" @if($eldocumento->estatus == 'Pendiente') selected="selected" @endif>Pendiente</option>
                                                        <option value="Correccion" @if($eldocumento->estatus == 'Correccion') selected="selected" @endif>Correccion</option>
                                                        @if(request()->session()->get('usuario')->nivel == 2)
                                                            <option value="Autorizado" @if($eldocumento->estatus == 'Autorizado') selected="selected" @endif>Autorizado</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <input type="hidden" id="txtId" name="txtId" value="{{ $eldocumento->id }}">
                                            <input type="hidden" id="txtNumerodocto" name="txtNumerodocto" value="{{ $eldocumento->numero }}">

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
    <script src="{{ url('public/js/documento_editar.js') }}"></script>
@stop