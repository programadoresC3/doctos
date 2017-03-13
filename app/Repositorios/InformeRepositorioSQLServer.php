<?php

namespace doctos\Repositorios;

use DB;
use Mockery\CountValidator\Exception;

class InformeRepositorioSQLServer implements InformeRepositorioInterface
{
    public function obtenerInformes()
    {
        try {
            $listaInforme = array();
            $lstaConcentrada = DB::select("Obtiene_Informe_Personal");
            $totalInformes = count($lstaConcentrada);
            if ($totalInformes >= 1) {
                foreach ($lstaConcentrada as $lstCon) {
                    $listaInforme[] = $lstCon;
                }
                return $listaInforme;
            }
        } catch(Exception $e){
            echo $e->getMessage();
            return null;
        }
    }

    //Nuevo informe de gobierno
    public function insertarInforme($id, $idGenera, $perido, $sintesis, $accion)
    {
        try {
            $insertInfor = DB::statement("Inserta_Informe_Personal ?,?,?,?,?", array(1, $idGenera, $perido, $sintesis, $accion));
            return $insertInfor;
        } catch(Exception $e){
            echo $e->getMessage();
            return null;
        }
    }

    //Obtiene el informe por ID
    public function obtenerInformeXId($id)
    {
        try {
            $elInforme = array();
            $elInfor = DB::select("Obtiene_Informe_Personal_X_Id ?", array($id));
            $totalInforme = count($elInfor);
            if($totalInforme >= 1) {
                foreach($elInfor as $informe) {
                    $elInforme[] = $informe;
                }
                return $elInforme;
            }
        } catch(Exception $e){
            echo $e->getMessage();
            return null;
        }
    }

    //Actualizar el informe
    public function actualizaInforme($id, $periodo, $sintesis)
    {
        try {
            $actualizar = DB::statement("Actualiza_Informe_Personal ?,?,?", array($id, $periodo, $sintesis));
            return $actualizar;
        } catch(Exception $e){
            echo $e->getMessage();
            return null;
        }
    }

    public function obtenerConcentrado($f1, $f2)
    {
        try{
            $listaConcentrado = array();
            $elConcentrado = DB::select("Obtiene_Informe_Persona_Periodo ?, ?", array($f1, $f2));
            $totalConcentrado = count($elConcentrado);
            if($totalConcentrado >= 1){
                foreach($elConcentrado as $elCon){
                    $listaConcentrado[] = $elCon;
                }
                return $listaConcentrado;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }
}