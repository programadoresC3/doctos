<?php

namespace doctos\Repositorios;

interface DocumentoRepositorioInterface
{
    public function obtenerDocumentos();
    public function obtenerGenerador();
    public function obtenerPara();
}