<?php

class ComentarioProg {

    private $id;
    private $autorId;
    private $entradaProgId;
    private $titulo;
    private $texto;
    private $fecha;

    function __construct($id, $autorId, $entradaProgId, $titulo, $texto, $fecha) {
        $this->id = $id;
        $this->autorId = $autorId;
        $this->entradaProgId = $entradaProgId;
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->fecha = $fecha;
    }

    public function obtenerId() {
        return $this->id;
    }

    public function obtenerAutorId() {
        return $this->autorId;
    }

    public function obtenerEntradaProgId() {
        return $this->entradaProgId;
    }

    public function obtenerTitulo() {
        return $this->titulo;
    }

    public function obtenerTexto() {
        return $this->texto;
    }

    public function obtenerFecha() {
        return $this->fecha;
    }

    public function cambiarTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function cambiarTexto($texto) {
        $this->texto = $texto;
    }

}
