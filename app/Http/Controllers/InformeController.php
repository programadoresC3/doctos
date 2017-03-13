<?php

namespace doctos\Http\Controllers;

use doctos\Repositorios\InformeRepositorioSQLServer;
use doctos\Repositorios\DocumentoRepositorioSQLServer;
use Illuminate\Http\Request;

use doctos\Http\Requests;

class InformeController extends Controller
{
    //
    public function index()
    {
        $listaInformes = new InformeRepositorioSQLServer();
        $listaInf = $listaInformes->obtenerInformes();

        return view('informeIndex', compact('listaInf'));
    }

    public function nuevo()
    {
        $losGeneradores = new DocumentoRepositorioSQLServer();
        $genero = $losGeneradores->obtenerGenerador();

        return view('informeNuevo', compact('genero'));
    }

    public function insertar(Request $request)
    {
        $id = 1;
        $idGenera = $request->get('cmbGenera');
        $perido = $request->get('txtFecha');
        $sintesis = $request->get('txtInforme');
        $accion = 1;

        $nuevoInforme = new InformeRepositorioSQLServer();
        $newInf = $nuevoInforme->insertarInforme($id, $idGenera, $perido, $sintesis, $accion);
        if ($newInf == false)
            return response(0);
        else
            return response(1);
    }

    public function  editar($id)
    {
        $losGeneradores = new DocumentoRepositorioSQLServer();
        $genero = $losGeneradores->obtenerGenerador();

        $elInforme = new InformeRepositorioSQLServer();
        $infor = $elInforme->obtenerInformeXId($id);

        return view('informeEditar', compact('genero', 'infor'));
    }

    public function actualizar(Request $request)
    {
        $id = $request->get('idInforme');
        $perido = $request->get('txtFecha');
        $sintesis = $request->get('txtInforme');

        //dd($id,' ', $idGenera,' ',$perido,' ',$sintesis,' ',$accion);

        $actulizacion = new InformeRepositorioSQLServer();
        $actua = $actulizacion->actualizaInforme($id, $perido, $sintesis);

        if($actua == false)
            return response(0);
        else
            return response(1);
    }

    public function concentrado()
    {
        return view ('concentrado');
    }

    public function concentradoDetalle(Request $request)
    {
        $fechaPoa01 = $request->get('fechaDe');
        $fechaPoa02 = $request->get('fechaA');

        try{
            $obtenerConcentrado = new InformeRepositorioSQLServer();
            $elConc = $obtenerConcentrado->obtenerConcentrado($fechaPoa01, $fechaPoa02);

//            if($request->get('origen') == "fecha") {
//                return view('concentradoDetalle', compact('elConc'))->render();
//            }

//            if($request->get('origen') == "fecha") {
//                return view('concentradoDetalle', compact('elConc'))->render();
//            }
            return view('concentradoDetalle', compact('elConc'))->render();
        }
        catch(\Exception $e){
            echo $e->getMessage();
            return null;
        }
    }
}
