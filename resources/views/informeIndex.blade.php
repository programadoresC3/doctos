@extends('app')

@section('contenido')
    <div class="row row-app">

        <!-- col -->
        <div class="col-md-12">

            <!-- col-separator.box -->
            <div class="col-separator col-unscrollable box col-separator-first">

                <!-- col-table -->
                <div class="col-table">

                    <h4 class="innerAll margin-none border-bottom">Informes por Persona Generadas</h4>

                    <!-- col-table-row -->
                    <div class="col-table-row">

                        <!-- col-app -->
                        <div class="col-app col-unscrollable">

                            <!-- col-app -->
                            <div class="col-app">

                                <!-- Stats Widgets -->
                                <div class="innerAll">

                                    <a href="{{ url('informeNuevo') }}" class="btn btn-primary"> Generar Nuevo Informe</a>
                                    <br>
                                    <br>

                                    @if(count($listaInf) > 0)
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th> ID</th>
                                                <th> Informa</th>
                                                <th> Fecha</th>
                                                <th> Periodo</th>
                                                <th> Editar</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($listaInf as $lst)
                                                <tr>
                                                    <td>{{ $lst->Id }}</td>
                                                    <td>{{ $lst->Genera }}</td>
                                                    <td>{{ $lst->Fecha}}</td>
                                                    <td>{{ $lst->Periodo}}</td>
                                                    <td><a href="{{ url('informeEditar/'. $lst->Id) }}">Editar</a></td>
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