@extends('app')

@section('contenido')
    <div class="row row-app">

        <!-- col -->
        <div class="col-md-12">

            <!-- col-separator.box -->
            <div class="col-separator col-unscrollable box col-separator-first">

                <!-- col-table -->
                <div class="col-table">

                    <h4 class="innerAll margin-none border-bottom">Incidencias Generadas</h4>

                    <!-- col-table-row -->
                    <div class="col-table-row">

                        <!-- col-app -->
                        <div class="col-app col-unscrollable">

                            <!-- col-app -->
                            <div class="col-app">

                                <!-- Stats Widgets -->
                                <div class="innerAll">

                                    <a href="{{ url('incidencias_nuevo') }}" class="btn btn-primary"> Generar Nueva Incidencia</a>
                                    <br>
                                    <br>

                                    @if(count($lasinci) > 0)
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th> ID</th>
                                                <th> Generado Por</th>
                                                <th> Fecha Incidencia</th>
                                                <th> Numero de Incidencia</th>
                                                <th> Estatus</th>
                                                <th> Editar</th>
                                                <th> Imprimir</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($lasinci as $inci)
                                                <tr>
                                                    <td>{{ $inci->id }}</td>
                                                    <td>{{ $inci->testigo }}</td>
                                                    <td>{{ $inci->fechaIncidencia }}</td>
                                                    <td>{{ $inci->numeroIncidencia}}</td>
                                                    <td>{{ $inci->estatus}}</td>
                                                    <td>
                                                        @if($inci->estatus == 'Pendiente' OR $inci->estatus == 'Correccion')
                                                            <a href="{{ url('incidencias_editar/'.$inci->id) }}">Editar</a>
                                                        @else
                                                            <a href="">_</a>
                                                        @endif
                                                    </td>
                                                    <td><a href="{{ url('public/reportes/print.php/?idocumento='.$inci->id.'&idreporte=2') }}">Print</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@stop