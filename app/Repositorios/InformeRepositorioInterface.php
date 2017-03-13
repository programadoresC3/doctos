<?php

namespace doctos\Repositorios;

interface InformeRepositorioInterface
{
    public function obtenerInformes();
    public function insertarInforme($id, $idGenera, $perido, $sintesis, $accion);
    public function obtenerInformeXId($id);
    public function actualizaInforme($id, $periodo, $sintesis);
}