<?php

namespace doctos\Repositorios;

interface InformeRepositorioInterface
{
    public function obtenerInformes();
    public function insertarInforme($id, $idGenera, $perido, $sintesis, $accion);
    public function obtenerInformeXId($id);
    public function actualizaInforme($id, $periodo, $sintesis);
    public function obtenerConcentrado($f1, $f2);                                                                       // Obtener el concentrado por ap en un rango de fecha
}