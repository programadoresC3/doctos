@extends('app')

@section('contenido')
    <div class="row row-app">
        <div class="col-md-12">
            <div class="col-separator col-separator-first col-unscrollable bg-none">
                <div class="col-table">
                    <div class="col-app col-unscrollable">
                        <!-- col-app -->
                        <div class="col-app">
                            <div class="box-generic padding-none overflow-hidden">
                                <div class="innerAll">
                                    <h3 class="margin-none">
                                        <i class="fa fa-search text-primary"></i> Concentrado de Informes
                                    </h3>
                                </div>
                            </div>

                            <div class="box-generic padding-none overflow-hidden">
                                <div class="innerAll">
                                    <form id="formConcentrado" autocomplete="off" action="{{ url('concentrdoDetalle') }}">
                                        {{ csrf_field() }}
                                        <div class="row border-bottom informes">
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">De :</label>
                                                    <input type="text" class="fecha form-control" id="fechaDe" name="fechaDe" placeholder="dd/mm/yyyy">
                                                </div>
                                            </div>

                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">A :</label>
                                                    <input type="text" class="fecha form-control" id="fechaA" name="fechaA" placeholder="dd/mm/yyyy">
                                                </div>
                                            </div>

                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    {{--<a href="{{ url('public/reportes/print.php/?f1='.$Conc->testigo.'&idreporte=1') }}">Print</a>--}}
                                                    <label class="control-label">Imprimir :</label>
                                                    {{--<a class="btn btn-default form-control" id="informe" name="informe" href="javascript:;" ><i class="fa fa-print"></i> Reporte por Periodo</a>--}}
                                                    <button type="button" class="btn btn-default form-control" id="informe"><i class="fa fa-print"></i> Reporte por Periodo</button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="origen" name="origen">
                                    </form>
                                    <span id="cargando" style="display: none;"><i class="fa fa-spinner fa-spin fa-2x"></i></span>
                                    <div id="dvResultadosConcentrado" style="max-height: 600px; overflow-y: scroll;">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="{{ url('resources/assets/components/common/forms/elements/bootstrap-datepicker/assets/lib/js/locales/bootstrap-datepicker.es.js') }}"></script>
    <script src="{{ url('public/js/concentrado.js') }}"></script>
@stop