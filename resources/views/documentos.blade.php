@extends('app')

@section('contenido')
    <div class="row row-app">

        <!-- col -->
        <div class="col-md-12">

            <!-- col-separator.box -->
            <div class="col-separator col-unscrollable box col-separator-first">

                <!-- col-table -->
                <div class="col-table">

                    <h4 class="innerAll margin-none border-bottom">Documentos Generados</h4>

                    <!-- col-table-row -->
                    <div class="col-table-row">

                        <!-- col-app -->
                        <div class="col-app col-unscrollable">

                            <!-- col-app -->
                            <div class="col-app">

                                <!-- Stats Widgets -->
                                <div class="innerAll">

                                    <a href="{{ url('doctos_nuevo') }}" class="btn btn-primary"> Generar Nuevo Documento</a>
                                    <br>
                                    <br>

                                    @if(count($losdoctos) > 0)
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th> ID</th>
                                                <th> Número</th>
                                                <th> Asunto</th>
                                                <th> Genera</th>
                                                <th> Para</th>
                                                <th> Fecha</th>
                                                <th> Documento</th>
                                                <th> Estatus</th>
                                                <th> Editar</th>
                                                <th> Imprimir</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($losdoctos as $docto)
                                                <tr>
                                                    <td>{{ $docto->id }}</td>
                                                    <td>{{ $docto->numero }}</td>
                                                    <td>{{ $docto->asuntoResumido}}</td>
                                                    <td>{{ $docto->testigo}}</td>
                                                    <td>{{ $docto->nombre}}</td>
                                                    <td>{{ $docto->fecha}}</td>
                                                    <td>{{ $docto->documento}}</td>
                                                    <td>{{ $docto->estatus}}</td>
                                                    <td>
                                                        @if($docto->estatus == 'Pendiente' OR $docto->estatus == 'Correccion')
                                                            <a href="{{ url('doctos_editar/'.$docto->id) }}">Editar</a>
                                                        @else
                                                            <a href="">_</a>
                                                        @endif
                                                    </td>
                                                    <td><a href="{{ url('public/reportes/print.php/?idocumento='.$docto->id.'&idreporte=1') }}">Print</a></td>
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