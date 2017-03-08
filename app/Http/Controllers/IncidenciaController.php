<?php

namespace doctos\Http\Controllers;

use doctos\Documentos\Incidencia;
use Illuminate\Http\Request;

use doctos\Http\Requests;

use doctos\Repositorios\IncidenciaRepositorioSQLServer;
use doctos\Repositorios\DocumentoRepositorioSQLServer;
use doctos\incidencias;
use doctos\numerosMax;
use DB;

class IncidenciaController extends Controller
{
    //
    public function index()
    {
        $lasincidencia = new IncidenciaRepositorioSQLServer();
        $lasinci = $lasincidencia->obtenerIncidencias();

        return view('incidencias_index', compact('lasinci'));
    }

    public function nuevo()
    {
        $losGeneradores = new DocumentoRepositorioSQLServer();
        $genero = $losGeneradores->obtenerGenerador();

        return view('incidencias_nuevo', compact('genero'));
    }

    public function insertaIncidencia(Request $request)
    {
        $nextInc = DB::table('incidencia')->max('id');

        $id = $nextInc;
        $idGen = $request->get('cmbGenera');
        $salida = ($request->get('chkOmision') == 'on' && $request->has('chkOmision') ? 1 : 0);
        $entrada = ($request->get('chkEntrada') == 'on' && $request->has('chkEntrada') ? 1 : 0);
        $incapacidad = ($request->get('chkMedica') == 'on' && $request->has('chkMedica') ? 1 : 0);
        $comision = ($request->get('chkComision') == 'on' && $request->has('chkComision') ? 1 : 0);
        $fechaIncidencia =$request->get('txtFechaincidencia');
        $observaciones = $request->get('txtObservacion');
        $activo = 1;
        $numeroIncidencia = 999;
        $estatus = 'Pendiente';

        $inciden = new Incidencia();

        $inciden->setId($id);
        $inciden->setIdGen($idGen);
        $inciden->setSalida($salida);
        $inciden->setEntrada($entrada);
        $inciden->setIncapacidad($incapacidad);
        $inciden->setComision($comision);
        $inciden->setFechaIncidencia($fechaIncidencia);
        $inciden->setObservaciones($observaciones);
        $inciden->setActivo($activo);
        $inciden->setNumeroIncidencia($numeroIncidencia);
        $inciden->setEstatus($estatus);

        $nuevaIncidencia = new IncidenciaRepositorioSQLServer();

        if(!$nuevaIncidencia->persistir($inciden))
            return response(0);
        else
            return response(1);
    }

    public function editar($idI)
    {
        $losGeneradores = new DocumentoRepositorioSQLServer();
        $genero = $losGeneradores->obtenerGenerador();

        $laincidencia = incidencias::find((int)$idI);
        return view('incidencias_editar', compact('laincidencia', 'genero'));
    }

    public function actualizar(Request $request)
    {
        $id = $request->get('txtId');
        //$estatus = 'Autorizado';
        $estatus = $request->get('cmbEstatus');
        $salida = ($request->get('chkOmision') == 'on' && $request->has('chkOmision') ? 1 : 0);
        $entrada = ($request->get('chkEntrada') == 'on' && $request->has('chkEntrada') ? 1 : 0);
        $incapacidad = ($request->get('chkMedica') == 'on' && $request->has('chkMedica') ? 1 : 0);
        $comision = ($request->get('chkComision') == 'on' && $request->has('chkComision') ? 1 : 0);
        $observaciones = $request->get('txtObservacion');
        $fechaIncidencia =$request->get('txtFechaincidencia');

        if($request->get('cmbEstatus') == 'Autorizado') {
            $numeroInc = DB::table('numerosMax')->where('documento','=', 'Incidencia')->max('contador');
            $numeroInc++;
            $numeroIncidencia = $numeroInc;

            $updNum = numerosMax::find(3);
            $updNum->contador = (int)$numeroInc;
            $updNum->save();
        } else {
            $numeroIncidencia = 999;
        }
        $comentarioJefe = $request->get('txtComentario');

        $actualizaIncidencia = new Incidencia();
        $actualizaIncidencia->setId($id);
        $actualizaIncidencia->setEstatus($estatus);
        $actualizaIncidencia->setSalida($salida);
        $actualizaIncidencia->setEntrada($entrada);
        $actualizaIncidencia->setIncapacidad($incapacidad);
        $actualizaIncidencia->setComision($comision);
        $actualizaIncidencia->setObservaciones($observaciones);
        $actualizaIncidencia->setFechaIncidencia($fechaIncidencia);
        $actualizaIncidencia->setNumeroIncidencia($numeroIncidencia);
        $actualizaIncidencia->setComentarioJefe($comentarioJefe);

        $updateInci = new IncidenciaRepositorioSQLServer();

        if(!$updateInci->actualizar($actualizaIncidencia))
        {
            return response(0);
        }

        return response(1);
    }
}