@extends('app')

@section('contenido')
    <div class="login">
        <div class="panel panel-default col-sm-4 col-sm-offset-3">

            <div class="panel-body">
                @if(isset($error))
                    <div class="alert alert-danger">
                        <strong>Error de inicio de sesión</strong>
                        {{ $error }}
                    </div>
                @endif
                <span class="text-primary center">Ingrese Nombre de usuario y contraseña para ingresar al sistema.</span>
                <div class="separator"></div>
                <form role="form" action="{{ url('log') }}" method="post" name="formLogin">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <input type="text" class="form-control" name="txtUs" id="txtUs" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="txtCl" id="txtCl" autocomplete="off" placeholder="Contraseña">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block no-ajaxify" value="Ingresar" />
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@stop