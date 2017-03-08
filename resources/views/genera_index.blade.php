@extends('app')

@section('contenido')
    <div class="row row-app">

        <!-- col -->
        <div class="col-md-12">

            <!-- col-separator.box -->
            <div class="col-separator col-unscrollable box col-separator-first">

                <!-- col-table -->
                <div class="col-table">

                    <h4 class="innerAll margin-none border-bottom">Mantenimiento de Marcas de Equipo de Cómputo</h4>

                    <!-- col-table-row -->
                    <div class="col-table-row">

                        <!-- col-app -->
                        <div class="col-app col-unscrollable">

                            <!-- col-app -->
                            <div class="col-app">

                                <!-- Stats Widgets -->
                                <div class="innerAll">

                                    <a href="{{ url('marca_agregar') }}" class="btn btn-primary"> Agregar Nuevas Marcas</a>
                                    <br>
                                    <br>

                                    @if(count($listaMarcas) > 0)
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th> ID</th>
                                                <th> Nombre</th>
                                                <th> Editar</th>
                                                <th> Eliminar</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($listaMarcas as $lasmarcas)
                                                <tr>
                                                    <td>{{ $lasmarcas->id }}</td>
                                                    <td>{{ $lasmarcas->marca }}</td>
                                                    <td><a href="{{ url('marca_editar/'.$lasmarcas->id) }}">Editar</a></td>
                                                    <td><a href="">Eliminar</a> </td>
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