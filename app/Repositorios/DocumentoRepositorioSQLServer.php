<?php

namespace doctos\Repositorios;

use DB;
use Mockery\CountValidator\Exception;
use doctos\Documentos\Documento;

class DocumentoRepositorioSQLServer implements DocumentoRepositorioInterface
{
    public function obtenerDocumentos()
    {
        $listaDocumentos = array();

        try{
            $DSDocumentos = DB::table('documento')
                ->join('genera', 'documento.idGenera', '=', 'genera.id')
                ->join('para', 'documento.idPara', '=', 'para.idp')
                ->select('documento.id', 'numero', 'testigo', DB::raw("convert(varchar(10),documento.fecha,103) as fecha"), 'estatus', 'documento', 'nombre', 'asuntoResumido')
                ->orderBy('documento.id', 'desc')
                ->get();

            $totalDoctos = count($DSDocumentos);

            if($totalDoctos > 0) {
                foreach($DSDocumentos as $DSDocto){
                    $listaDocumentos[] = $DSDocto;
                }
                return $listaDocumentos;
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
            return null;
        }
    }

    public function obtenerGenerador()
    {
        $listaGenerador = array();

        try{
            $DSGenerador = DB::table('genera')
                ->select('id', 'testigo')
                ->where('activo', '=', 1)
                ->orderBy('testigo')
                ->get();

            $totalGen = count($DSGenerador);

            if($totalGen > 0) {
                foreach($DSGenerador as $DSGenera) {
                    $listaGenerador[] = $DSGenera;
                }
                return $listaGenerador;
            }
        }catch (Exception $e){
            echo $e->getMessage();
            return null;
        }
    }

    public function obtenerPara()
    {
        $listaPara = array();

        try{
            $DSParaquien = DB::table('para')
                ->select('idp', 'nombre')
                ->where('activo', '=', 1)
                ->orderBy('nombre')
                ->get();

            $totalPara = count($DSParaquien);

            if($totalPara > 0){
                foreach($DSParaquien as $DSPara){
                    $listaPara[] = $DSPara;
                }
                return $listaPara;
            }

        }catch (Exception $e){
            echo $e->getMessage();
            return null;
        }
    }

    public function persistir(Documento $doc)
    {
        try{
            DB::table('documento')
                ->insert([
                    'id' => (int)$doc->getId()+1,
                    'idGenera' => (int)$doc->getIdGenera(),
                    'idPara' => (int)$doc->getIdPara(),
                    'documento' => $doc->getDocumento(),
                    'fecha' => $doc->getFecha(),
                    'ccp' => $doc->getCcp(),
                    'contenido' => $doc->getContenido(),
                    'estatus' => $doc->getEstatus(),
                    'impreso' => $doc->getImpreso(),
                    'numero' => $doc->getNumero(),
                    'paraOficio' => $doc->getParaOficio(),
                    'asuntoResumido' => $doc->getAsuntoResumido()
                ]);
            return true;
        } catch(\PDOException $e) {
            $e->getMessage();
            return false;
        }
    }

    public function actualizar(Documento $updDoc)
    {
        //$variable = $updDoc->getId()." ".$updDoc->getIdGenera()." ".$updDoc->getIdPara()." ".$updDoc->getDocumento()." ".$updDoc->getFecha()." ".$updDoc->getCcp()." ".$updDoc->getContenido()." ".$updDoc->getEstatus()." ".$updDoc->getImpreso()." ".$updDoc->getNumero();
        //dd($variable);
        try{
            DB::table('documento')
                ->where('id', $updDoc->getId())
                ->update([
                    'idGenera'=>(int)$updDoc->getIdGenera(),
                    'idPara'=>(int)$updDoc->getIdPara(),
                    'documento'=>$updDoc->getDocumento(),
                    'fecha'=>$updDoc->getFecha(),
                    'ccp'=>$updDoc->getCcp(),
                    'contenido'=>$updDoc->getContenido(),
                    'estatus'=>$updDoc->getEstatus(),
                    'impreso'=>$updDoc->getImpreso(),
                    'numero'=>$updDoc->getNumero(),
                    'comentarioJefe'=>$updDoc->getComentarioJefe(),
                    'paraOficio'=>$updDoc->getParaOficio(),
                    'asuntoResumido' =>$updDoc->getAsuntoResumido()
                ]);

            return true;


        } catch(\PDOException $e) {
            $e->getMessage();
            return false;
        }
    }

    public function seleccionar($id)
    {
        try {
            $eldocumentoobtenido = DB::table('documento')
                ->where('id', $id)
                ->select('id', 'idGenera', 'idPara','documento',DB::raw("convert(varchar(10),documento.fecha,103) as fecha"), 'ccp', 'contenido', 'estatus', 'impreso', 'numero', 'comentarioJefe', 'paraOficio', 'asuntoResumido')
                ->first();
            return $eldocumentoobtenido;
        }catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }
}