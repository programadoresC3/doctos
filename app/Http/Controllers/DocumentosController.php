<?php

namespace doctos\Http\Controllers;

use doctos\Documentos\Documento;
use Illuminate\Http\Request;

use doctos\Http\Requests;
use doctos\Repositorios\DocumentoRepositorioSQLServer;
use doctos\documentos;
use doctos\numerosMax;
use DB;

class DocumentosController extends Controller
{
    //pantalla principal que muestra el listado de documentos listo para revisar e imprimir
    public function index()
    {
        $losdocumentos = new DocumentoRepositorioSQLServer();
        $losdoctos = $losdocumentos->obtenerDocumentos();

        return view('documentos', compact('losdoctos'));
    }

    //pantalla para generar un nuevo documento
    public function nuevo()
    {
        $losGeneradores = new DocumentoRepositorioSQLServer();
        $losGenera = $losGeneradores->obtenerGenerador();
        $paraquienes = $losGeneradores->obtenerPara();

        return view('documento_nuevo', compact('losGenera', 'paraquienes'));
    }

    public function insertarDocumento(Request $request)
    {
        $nextDocumento = DB::table('documento')->max('id');

        $id = $nextDocumento;
        $idGenera = $request->get('cmbGenera');
        if($request->get('cmbDocumento') == 'Oficio')
            $idPara = 15;
        else
            $idPara = $request->get('cmbPara');
        $documento = $request->get('cmbDocumento');
        $fecha = $request->get('txtFecha');
        $ccp = $request->get('txtCcp');
        $contenido = $request->get('txtAsunto');
        $estatus = "Pendiente";
        $impreso = 0;
        $numero = 'Pendiente';
        $paraOficio = $request->get('txtParaOficio');
        $asuntoResumido = $request->get('txtAsuntoresumido');

        $docto = new Documento();

        $docto->setId($id);
        $docto->setIdGenera($idGenera);
        $docto->setIdPara($idPara);
        $docto->setDocumento($documento);
        $docto->setFecha($fecha);
        $docto->setCcp($ccp);
        $docto->setContenido($contenido);
        $docto->setEstatus($estatus);
        $docto->setImpreso($impreso);
        $docto->setNumero($numero);
        $docto->setParaOficio($paraOficio);
        $docto->setAsuntoResumido($asuntoResumido);

        $nuevoDocumento = new DocumentoRepositorioSQLServer();

        if(!$nuevoDocumento->persistir($docto))
        {
            return response(0);
        }

        return response(1);
    }

    public function editar($id)
    {
        $datosContenidos = new DocumentoRepositorioSQLServer();
        $genera = $datosContenidos->obtenerGenerador();
        $paraqu = $datosContenidos->obtenerPara();
        $eldocumento = $datosContenidos->seleccionar($id);

        //$eldocumento = documentos::find((int)$id);
        return view('documento_editar', compact('eldocumento', 'genera', 'paraqu'));
    }

    public function actualizar(Request $request)
    {
        $id = $request->get('txtId');
        $idGenera = $request->get('cmbGenera');
        $idPara = $request->get('cmbPara');
        $documento = $request->get('cmbDocumento');
        $fecha = $request->get('txtFecha');
        $ccp = $request->get('txtCcp');
        $contenido = $request->get('txtAsunto');
        $estatus = $request->get('cmbEstatus');
        $impreso = 0;
        $asuntoResumido = $request->get('txtAsuntoresumido');

        if($request->get('cmbEstatus') == 'Autorizado') {
            $siguienteNumero = DB::table('numerosMax')->where('documento','=',$documento)->max('contador');
            $siguienteNumero++;
            $numero = "CECCC/UI/".$siguienteNumero."/2017";

            if($request->get('cmbDocumento') == 'Memorandum')
                $updNum = numerosMax::find(1);
            elseif($request->get('cmbDocumento') == 'Oficio')
                $updNum = numerosMax::find(2);
            elseif($request->get('cmbDocumento') == 'Tarjeta')
                $updNum = numerosMax::find(4);
            elseif($request->get('cmbDocumento') == 'Circular')
                $updNum = numerosMax::find(5);

            $updNum->contador = (int)$siguienteNumero;
            $updNum->save();
        } else
        {
            $numero = 'Pendiente';
        }
        $comentarioJefe = $request->get('txtComentario');
        $paraOficio = $request->get('txtParaOficio');

        $actualizaDocumento = new Documento();

        $actualizaDocumento->setId($id);
        $actualizaDocumento->setIdGenera($idGenera);
        $actualizaDocumento->setIdPara($idPara);
        $actualizaDocumento->setDocumento($documento);
        $actualizaDocumento->setFecha($fecha);
        $actualizaDocumento->setCcp($ccp);
        $actualizaDocumento->setContenido($contenido);
        $actualizaDocumento->setEstatus($estatus);
        $actualizaDocumento->setImpreso($impreso);
        $actualizaDocumento->setNumero($numero);
        $actualizaDocumento->setComentarioJefe($comentarioJefe);
        $actualizaDocumento->setParaOficio($paraOficio);
        $actualizaDocumento->setAsuntoResumido($asuntoResumido);

        $updateDocto = new DocumentoRepositorioSQLServer();

        if(!$updateDocto->actualizar($actualizaDocumento))
        {
            return response(0);
        }

        return response(1);
    }
}
