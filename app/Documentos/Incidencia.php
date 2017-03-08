<?php

namespace doctos\Documentos;

class Incidencia
{
    private $id;
    private $fecha;
    private $idGen;
    private $salida;
    private $entrada;
    private $incapacidad;
    private $comision;
    private $fechaIncidencia;
    private $observaciones;
    private $activo;
    private $numeroIncidencia;
    private $estatus;
    private $comentarioJefe;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $idI
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getIdGen()
    {
        return $this->idGen;
    }

    /**
     * @param mixed $idGen
     */
    public function setIdGen($idGen)
    {
        $this->idGen = $idGen;
    }

    /**
     * @return mixed
     */
    public function getSalida()
    {
        return $this->salida;
    }

    /**
     * @param mixed $salida
     */
    public function setSalida($salida)
    {
        $this->salida = $salida;
    }

    /**
     * @return mixed
     */
    public function getEntrada()
    {
        return $this->entrada;
    }

    /**
     * @param mixed $entrada
     */
    public function setEntrada($entrada)
    {
        $this->entrada = $entrada;
    }

    /**
     * @return mixed
     */
    public function getIncapacidad()
    {
        return $this->incapacidad;
    }

    /**
     * @param mixed $incapacidad
     */
    public function setIncapacidad($incapacidad)
    {
        $this->incapacidad = $incapacidad;
    }

    /**
     * @return mixed
     */
    public function getComision()
    {
        return $this->comision;
    }

    /**
     * @param mixed $comision
     */
    public function setComision($comision)
    {
        $this->comision = $comision;
    }

    /**
     * @return mixed
     */
    public function getFechaIncidencia()
    {
        return $this->fechaIncidencia;
    }

    /**
     * @param mixed $fechaIncidencia
     */
    public function setFechaIncidencia($fechaIncidencia)
    {
        $this->fechaIncidencia = $fechaIncidencia;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @param mixed $observaciones
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }

    /**
     * @return mixed
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * @param mixed $activo
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;
    }

    /**
     * @return mixed
     */
    public function getNumeroIncidencia()
    {
        return $this->numeroIncidencia;
    }

    /**
     * @param mixed $numeroIncidencia
     */
    public function setNumeroIncidencia($numeroIncidencia)
    {
        $this->numeroIncidencia = $numeroIncidencia;
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


}
