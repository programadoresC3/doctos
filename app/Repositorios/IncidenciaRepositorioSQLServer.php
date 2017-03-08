<?php

namespace doctos\Repositorios;

use DB;
use doctos\Repositorios\IncidenciaRepositorioInterface;
use doctos\Documentos\Incidencia;
use Mockery\CountValidator\Exception;

class IncidenciaRepositorioSQLServer implements IncidenciaRepositorioInterface
{
    public function obtenerIncidencias()
    {
        $listaIncidencias = array();

        try{
            $DSIncidencia = DB::table('incidencia')
                ->join('genera', 'incidencia.idGen', '=', 'genera.id')
                ->select('incidencia.id', 'testigo', 'fechaIncidencia', 'numeroIncidencia', 'estatus')
                ->orderBy('incidencia.id', 'desc')
                ->get();

            $totalIncidencia = count($DSIncidencia);

            if($totalIncidencia > 0){
                foreach($DSIncidencia as $DSInci) {
                    $listaIncidencias[] = $DSInci;
                }
                return $listaIncidencias;
            }
        } catch(Exception $e) {
            $e->getMessage();
            return null;
        }
    }

    public function persistir(Incidencia $inc)
    {
        try{
            DB::table('incidencia')
                ->insert([
                    'id' => (int)$inc->getId()+1,
                    'fecha' => date("d/m/Y"),
                    'idGen' => $inc->getIdGen(),
                    'salida' => $inc->getSalida(),
                    'entrada' => $inc->getEntrada(),
                    'incapacidad' => $inc->getIncapacidad(),
                    'comision' => $inc->getComision(),
                    'fechaIncidencia' => $inc->getFechaIncidencia(),
                    'observaciones' => $inc->getObservaciones(),
                    'activo' => $inc->getActivo(),
                    'numeroIncidencia' => $inc->getNumeroIncidencia(),
                    'estatus' => $inc->getEstatus()
                ]);
            return true;
        } catch(\PDOException $e) {
            $e->getMessage();
            return false;
        }
    }

    public function actualizar(Incidencia $incUpd)
    {
        try {
            DB::table('incidencia')
                ->where('id', $incUpd->getId())
                ->update([
                    'estatus'=>$incUpd->getEstatus(),
                    'salida'=>$incUpd->getSalida(),
                    'entrada'=>$incUpd->getEntrada(),
                    'incapacidad'=>$incUpd->getIncapacidad(),
                    'comision'=>$incUpd->getComision(),
                    'observaciones'=>$incUpd->getObservaciones(),
                    'fechaIncidencia'=>$incUpd->getFechaIncidencia(),
                    'numeroIncidencia'=>$incUpd->getNumeroIncidencia(),
                    'comentarioJefe'=>$incUpd->getComentarioJefe()
                ]);
            return true;
        }catch (\PDOException $e) {
            $e->getMessage();
            return false;
        }
    }
}