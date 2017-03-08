<?php

namespace doctos\Documentos;

class Documento
{
    private $id;
    private $idGenera;
    private $idPara;
    private $documento;
    private $fecha;
    private $ccp;
    private $contenido;
    private $estatus;
    private $impreso;
    private $numero;
    private $comentarioJefe;
    private $paraOficio;
    private $asuntoResumido;

    /**
     * @return mixed
     */
    public function getAsuntoResumido()
    {
        return $this->asuntoResumido;
    }

    /**
     * @param mixed $asuntoResumido
     */
    public function setAsuntoResumido($asuntoResumido)
    {
        $this->asuntoResumido = $asuntoResumido;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdGenera()
    {
        return $this->idGenera;
    }

    /**
     * @param mixed $idGenera
     */
    public function setIdGenera($idGenera)
    {
        $this->idGenera = $idGenera;
    }

    /**
     * @return mixed
     */
    public function getIdPara()
    {
        return $this->idPara;
    }

    /**
     * @param mixed $idPara
     */
    public function setIdPara($idPara)
    {
        $this->idPara = $idPara;
    }

    /**
     * @return mixed
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * @param mixed $documento
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getCcp()
    {
        return $this->ccp;
    }

    /**
     * @param mixed $ccp
     */
    public function setCcp($ccp)
    {
        $this->ccp = $ccp;
    }

    /**
     * @return mixed
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * @param mixed $contenido
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    /**
     * @return mixed
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * @param mixed $estatus
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    }

    /**
     * @return mixed
     */
    public function getImpreso()
    {
        return $this->impreso;
    }

    /**
     * @param mixed $impreso
     */
    public function setImpreso($impreso)
    {
        $this->impreso = $impreso;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getComentarioJefe()
    {
        return $this->comentarioJefe;
    }

    /**
     * @param mixed $comentarioJefe
     */
    public function setComentarioJefe($comentarioJefe)
    {
        $this->comentarioJefe = $comentarioJefe;
    }

    /**
     * @return mixed
     */
    public function getParaOficio()
    {
        return $this->paraOficio;
    }

    /**
     * @param mixed $paraOficio
     */
    public function setParaOficio($paraOficio)
    {
        $this->paraOficio = $paraOficio;
    }



}